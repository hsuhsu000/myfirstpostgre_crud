<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $blog_content = $_POST['blog_content'];

    $formatted_blog = "Blog written by $username: $blog_content" . PHP_EOL;
    
    // Append the blog to the blogs.txt file
    $blogs_file = fopen("blogs.txt", "a");
    fwrite($blogs_file, $formatted_blog);
    fclose($blogs_file);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Write Blog</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <form method="post">
        <textarea name="blog_content" placeholder="Write your blog"></textarea><br>
        <input type="submit" value="Submit Blog">
    </form>
    <br>
    <a href="index1.php">Go back to homepage</a>
</body>
</html>
