<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog System</title>
</head>
<body>
    <h1>Welcome to the Blog System</h1>
    <?php
    if (isset($_SESSION['username'])) {
        echo '<a href="write_blog.php">Write Blog</a> | ';
        echo '<a href="logout.php">Logout</a>';
    } else {
        echo '<a href="login.php">Login</a> | <a href="register.php">Create Account</a>';
    }
    ?>

    <h2>Recent Blogs:</h2>
    <?php
    $recent_blogs = file("blogs.txt", FILE_IGNORE_NEW_LINES);
    foreach ($recent_blogs as $blog) {
        echo "<p>$blog</p>";
    }
    ?>
</body>
</html>
