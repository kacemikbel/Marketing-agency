<!-- /admin/edit_blog.php -->
<?php
require '../../php/connectdb.php';

$id = $_GET['id'];
$sql = "SELECT * FROM blog_posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $excerpt = $_POST['excerpt'];
    $image_url = $_POST['image_url'];

    $update_sql = "UPDATE blog_posts SET title = ?, date = ?, excerpt = ?, image_url = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param('ssssi', $title, $date, $excerpt, $image_url, $id);
    $update_stmt->execute();
    $update_stmt->close();
    $conn->close();

    header('Location: blog.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="./styledash.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="blog.php">Manage Blogs</a></li>
            <li><a href="projects.php">Manage Projects</a></li>
            <li><a href="usersubmission.php">Manage User Submissions</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Edit Blog</h1>
        <form action="edit_blog.php?id=<?= $id ?>" method="POST">
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($blog['title']) ?>" required>
            </div>
            <div>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="<?= htmlspecialchars($blog['date']) ?>" required>
            </div>
            <div>
                <label for="excerpt">Excerpt:</label>
                <textarea id="excerpt" name="excerpt" required><?= htmlspecialchars($blog['excerpt']) ?></textarea>
            </div>
            <div>
                <label for="image_url">Image URL:</label>
                <input type="url" id="image_url" name="image_url" value="<?= htmlspecialchars($blog['image_url']) ?>" required>
            </div>
            <button type="submit">Update Blog</button>
        </form>
    </div>
    
</body>
</html>
