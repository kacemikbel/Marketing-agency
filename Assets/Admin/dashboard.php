<?php 
include('../../php/connectdb.php');

// Fetch total number of blog posts
$sql = "SELECT COUNT(*) as count FROM blog_posts";
$result = $conn->query($sql);
$total_blog_posts = $result->fetch_assoc()['count'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <div class="sidebar w-1/4 bg-gray-800 text-white h-screen p-5">
            <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>
            <ul>
                <li class="mb-3"><a href="index.php" class="hover:text-yellow-500">Dashboard</a></li>
                <li class="mb-3"><a href="blog.php" class="hover:text-yellow-500">Manage Blogs</a></li>
            </ul>
        </div>
        <div class="content w-3/4 p-8">
            <h1 class="text-3xl font-bold mb-8">Welcome to the Admin Dashboard</h1>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Total Blog Posts</h2>
                <p class="text-3xl"><?php echo $total_blog_posts; ?></p>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
