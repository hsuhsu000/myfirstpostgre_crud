<?php
include_once 'db.php';

if (count($_POST) > 0) {
    $id = $_POST['userid'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city_name = $_POST['city_name'];
    $email = $_POST['email'];

    $updateQuery = "UPDATE employee SET first_name='$first_name', last_name='$last_name',
        city_name='$city_name', email='$email' WHERE id='$id'";

    if ($result = pg_query($db, $updateQuery)) {
        echo "Record Updated Successfully.";
    } else {
        echo "Error updating record.";
    }

    // Handle image update
    if ($_FILES['image']['error'] === 0) {
        $imageFilePath = $_FILES['image']['tmp_name']; // Get the temporary file path
        $img = fopen($imageFilePath, 'r') or die("Cannot read image\n");
        $imageData = fread($img, filesize($imageFilePath));
        fclose($img);

        $imageDataEscaped = pg_escape_bytea($imageData);
        $imageType = $_FILES['image']['type']; // Get the MIME type from the uploaded file

        $imageUpdateQuery = "UPDATE employee SET image='$imageDataEscaped', image_type='$imageType' WHERE id='$id'";

        if ($result = pg_query($db, $imageUpdateQuery)) {
            echo "Image Updated Successfully.";
        } else {
            echo "Error updating image.";
        }
    }
}

$result = pg_query($db, "SELECT * FROM employee WHERE id='" . $_GET['userid'] . "'");
$row = pg_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Employee Data</title>
</head>
<body>
    <form name="frmUser" method="post" action="" enctype="multipart/form-data">
        <div><?php if (isset($message)) { echo $message; } ?></div>
        <div style="padding-bottom: 5px;">
            <a href="view.php">Employee List</a>
        </div>
        Username: <br>
        <input type="hidden" name="userid" class="txtField" value="<?php echo $row['id']; ?>">
        <input type="text" name="userid" value="<?php echo $row['id']; ?>"><br>
        First Name: <br>
        <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"><br>
        Last Name :<br>
        <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"><br>
        City:<br>
        <input type="text" name="city_name" value="<?php echo $row['city_name']; ?>"><br>
        Email:<br>
        <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
        <label for="image">Image:</label>
        <input type="file" name="image"><br>
        <?php
        if (!empty($row["image"])) {
            $imageData = pg_unescape_bytea($row["image"]);
            $imageType = $row["image_type"];
            $base64Data = base64_encode($imageData);
            $imageSrc = "data:$imageType;base64,$base64Data";
            echo '<img src="' . $imageSrc . '" alt="Image"><br>';
        } else {
            echo "No image available<br>";
        }
        ?>
        <br>
        <input type="submit" name="update" value="Update" class="button">
    </form>
</body>
</html>
