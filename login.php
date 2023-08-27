<?php
session_start();
$user_accounts = [
    'user1' => 'password123',
    'user2' => 'pass456'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (array_key_exists($username, $user_accounts) && $user_accounts[$username] === $password) {
        $_SESSION['username'] = $username;
        header('Location: index1.php');
    } else {
        echo "Login failed. Please check your credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Login">
    </form>
    <br>
    <a href="index1.php">Go back to homepage</a>
</body>
</html>
