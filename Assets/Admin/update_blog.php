<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../php/connectdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $excerpt = $_POST['excerpt'];
    $image_url = $_POST['image_url'];

    
    $sql = "UPDATE blog_posts SET title = ?, date = ?, excerpt = ?, image_url = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssssi", $title, $date, $excerpt, $image_url, $id);

    if ($stmt->execute()) {
        echo "Blog post updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
