<?php
	include_once 'db.php';
	$query = "DELETE FROM employee WHERE id='" . $_GET["userid"] . "'";
	if($result = pg_query($query)){
		echo "Data Deleted Successfully.";
        ?><a href="view.php">Employee List</a><?php
	}
	else{
		echo "Error.";
	}
?>