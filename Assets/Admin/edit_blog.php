<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../php/connectdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = "SELECT * FROM blog_posts WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
        
            $title = $row['title'];
            $date = $row['date'];
            $excerpt = $row['excerpt'];
            $image_url = $row['image_url'];
        } else {
            echo "Blog post not found.";
            exit;
        }
    } else {
        echo "Error: " . $stmt->error;
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method or missing ID parameter.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="max-w-2xl mx-auto py-16">
        <h1 class="text-3xl font-bold mb-8">Edit Blog Post</h1>
        <form action="update_blog.php" method="POST" class="bg-white p-8 rounded shadow-md">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded" value="<?php echo $title; ?>" required>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-gray-700">Date</label>
                <input type="date" name="date" id="date" class="w-full px-3 py-2 border rounded" value="<?php echo $date; ?>" required>
            </div>
            <div class="mb-4">
                <label for="excerpt" class="block text-gray-700">Excerpt</label>
                <textarea name="excerpt" id="excerpt" class="w-full px-3 py-2 border rounded" required><?php echo $excerpt; ?></textarea>
            </div>
            <div class="mb-4">
                <label for="image_url" class="block text-gray-700">Image URL</label>
                <input type="url" name="image_url" id="image_url" class="w-full px-3 py-2 border rounded" value="<?php echo $image_url; ?>" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Blog Post</button>
        </form>
    </div>
</body>
</html>
