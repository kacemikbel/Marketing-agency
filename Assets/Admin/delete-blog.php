<!-- /admin/delete_blog.php -->
<?php
require '../../php/connectdb.php';

$id = $_GET['id'];
$sql = "DELETE FROM blog_posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();
$conn->close();

header('Location: blog.php');
exit;
?>
