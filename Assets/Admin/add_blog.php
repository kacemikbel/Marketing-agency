<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../php/connectdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $excerpt = $_POST['excerpt'];
    $image_url = $_POST['image_url'];

    
    echo "Title: $title<br>Date: $date<br>Excerpt: $excerpt<br>Image URL: $image_url<br>";

    $sql = "INSERT INTO blog_posts (title, date, excerpt, image_url) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssss", $title, $date, $excerpt, $image_url);

    
    if ($stmt->execute()) {
        echo "New blog post added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="max-w-2xl mx-auto py-16">
        <h1 class="text-3xl font-bold mb-8">Add New Blog Post</h1>
        <form action="add_blog.php" method="POST" class="bg-white p-8 rounded shadow-md">
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-gray-700">Date</label>
                <input type="date" name="date" id="date" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="excerpt" class="block text-gray-700">Excerpt</label>
                <textarea name="excerpt" id="excerpt" class="w-full px-3 py-2 border rounded" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image_url" class="block text-gray-700">Image URL</label>
                <input type="url" name="image_url" id="image_url" class="w-full px-3 py-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Blog Post</button>
        </form>
    </div>
</body>
</html>
