<?php
include_once 'db.php';
$result = pg_query($db,"SELECT * FROM employee");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 <style>
        .image-container {
            width: 150px; /* Set your desired width */
            height: auto;
        }
        .image-container img {
            width: 100%;
            height: auto;
        }
    </style>
 </head>
<body>
<table>
	<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>City</td>
		<td>Email id</td>
	</tr>
<?php
$i=0;
while($row=pg_fetch_assoc($result)) {
?>
	<tr>
		<td><?php echo $row["first_name"]; ?></td>
		<td><?php echo $row["last_name"]; ?></td>
		<td><?php echo $row["city_name"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		<td class="image-container">
        <?php
        if (!empty($row["image"])) {
            $imageData = pg_unescape_bytea($row["image"]);
            $base64Data = base64_encode($imageData);
            $imageSrc = "data:image;base64,$base64Data";
            echo '<img src="' . $imageSrc . '" alt="Image"><br>';
        } else {
            echo "No image available<br>";
        }
        ?>
                </td>
        <td><a href="update-process.php?userid=<?php echo $row["id"]; ?>">Update</a></td>
        <td><a href="delete-process.php?userid=<?php echo $row["id"]; ?>">Delete</a></td>
	</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>