<?php
$user_accounts = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!array_key_exists($username, $user_accounts)) {
        $user_accounts[$username] = $password;
        echo "Account created successfully!";
    } else {
        echo "Username already exists!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
</head>
<body>
    <h2>Create Account</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Create Account">
    </form>
    <br>
    <a href="index1.php">Go back to homepage</a>
</body>
</html>
