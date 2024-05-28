<?php 
include('../../php/connectdb.php'); 

$limit = 3; 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM blog_posts ORDER BY date DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$total_sql = "SELECT COUNT(*) FROM blog_posts";
$total_result = $conn->query($total_sql);
$total_rows = $total_result->fetch_row()[0];
$total_pages = ceil($total_rows / $limit);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
    </style>
</head>
<body>
    <section class="bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-5xl font-extrabold text-gray-900">Latest Blog Posts</h2>
                <p class="mt-4 text-xl text-gray-700">Stay updated with our latest news and articles</p>
            </div>
            <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 hover:shadow-2xl transition-all duration-300">
                            <div class="overflow-hidden">
                                <img class="w-full h-56 object-cover transform hover:scale-110 transition-transform duration-300" src="<?php echo $row['image_url']; ?>" alt="Blog Post">
                            </div>
                            <div class="p-6">
                                <h3 class="text-2xl font-bold text-gray-900"><?php echo $row['title']; ?></h3>
                                <p class="text-sm text-gray-500 mt-2"><?php echo date('F d, Y', strtotime($row['date'])); ?></p>
                                <p class="mt-4 text-gray-600 line-clamp-3" id="post-<?php echo $row['id']; ?>-desc"><?php echo $row['excerpt']; ?></p>
                                <button onclick="toggleReadMore('post-<?php echo $row['id']; ?>-desc')" class="mt-6 inline-block text-indigo-600 font-semibold hover:text-indigo-800 transition-colors duration-300">Read More &rarr;</button>
                                <a href="delete_blog.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this blog post?');" class="mt-6 inline-block text-red-500 hover:text-red-700 transition-colors duration-300">Delete</a>
                                <a href="edit_blog.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to edit this blog post?');" class="mt-6 p-4 inline-block text-blue-500 hover:text-red-700 transition-colors duration-300">edit</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No blog posts found.</p>
                <?php endif; ?>
            </div>
            <div class="mt-12">
                <nav class="block">
                    <ul class="flex justify-center">
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li>
                                <a href="?page=<?php echo $i; ?>" class="mx-1 px-3 py-2 rounded-lg bg-white border border-gray-300 text-gray-700 <?php if ($page == $i) echo 'bg-indigo-600 text-white'; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <script>
        function toggleReadMore(id) {
            const element = document.getElementById(id);
            element.classList.toggle('line-clamp-3');
        }
    </script>
    
    <a href="add_blog.php" class="bg-blue-500 text-white px-4 py-2 rounded">Add Blog</a>
</body>
</html>
