<!DOCTYPE html>
<html>
  <body>
	<form method="post" action="process.php" enctype="multipart/form-data">
		First name:<br>
		<input type="text" name="first_name">
		<br>
		Last name:<br>
		<input type="text" name="last_name">
		<br>
		City name:<br>
		<input type="text" name="city_name">
		<br>
		Email Id:<br>
		<input type="email" name="email">
		<br><br>
        <label for="image">Image:</label>
        <input type="file" name="image"><br><br>
		<input type="submit" name="save" value="submit">
	</form>
  </body>
</html>