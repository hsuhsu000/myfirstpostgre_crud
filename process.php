<?php
include_once 'db.php';
if(isset($_POST['save']))
{	 
	 $first_name = $_POST['first_name'];
	 $last_name = $_POST['last_name'];
	 $city_name = $_POST['city_name'];
	 $email = $_POST['email'];
	     // Handle image upload
         if ($_FILES['image']['error'] === 0) {
            $image = pg_escape_bytea(file_get_contents($_FILES['image']['tmp_name']));
        } else {
            // Default image if no image is uploaded
            $image = pg_escape_bytea(file_get_contents('images.jpg'));
        }
    
        $imageType = $_FILES['image']['type']; // Get the MIME type from the uploaded file
        $image = pg_escape_bytea(file_get_contents($_FILES['image']['tmp_name']));

        $query = "INSERT INTO employee (first_name, last_name, city_name, email, image, image_type) 
                VALUES ('$first_name', '$last_name', '$city_name', '$email', '$image', '$imageType')";
        $result = pg_query($db, $query);

    
        if ($result) {
            echo "Data Added Successfully.";
        } else {
            echo "Error executing query.";
        }
    }
    
    // Close the database connection
    pg_close($db);
?>