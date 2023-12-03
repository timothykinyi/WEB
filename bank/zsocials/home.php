<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit();
}

// Fetch posts from the database
$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="logout.php">Logout</a>

    <h3>Create a Post</h3>
    <form method="post" action="create_post.php">
        <textarea name="content" rows="4" required></textarea>
        <input type="submit" value="Post">
    </form>

    <h3>Posts</h3>
    <?php foreach ($posts as $post): ?>
        <div>
            <p><?php echo $post['content']; ?></p>
            <small>Posted by User <?php echo $post['user_id']; ?> on <?php echo $post['created_at']; ?></small>
        </div>
    <?php endforeach; ?>
</body>
</html>
