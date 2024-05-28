<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Edit Project</h1>
        <?php
        include('../../php/connectdb.php');

        // Check if ID is provided in the URL
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];

            // Fetch project details from the database
            $sql = "SELECT id, title, description, image_url, category1, category2 FROM projects WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $title = $row['title'];
                $description = $row['description'];
                $image = $row['image_url'];
                $category1 = $row['category1'];
                $category2 = $row['category2'];
                ?>
                <form action="update_project.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="title" class="block mb-2">Title:</label>
                    <input type="text" name="title" id="title" class="w-full px-3 py-2 mb-4 border rounded" value="<?php echo $title; ?>">
                    <label for="description" class="block mb-2">Description:</label>
                    <textarea name="description" id="description" class="w-full px-3 py-2 mb-4 border rounded"><?php echo $description; ?></textarea>
                    <label for="image" class="block mb-2">Image URL:</label>
                    <input type="text" name="image" id="image" class="w-full px-3 py-2 mb-4 border rounded" value="<?php echo $image; ?>">
                    <label for="category1" class="block mb-2">Category 1:</label>
                    <input type="text" name="category1" id="category1" class="w-full px-3 py-2 mb-4 border rounded" value="<?php echo $category1; ?>">
                    <label for="category2" class="block mb-2">Category 2:</label>
                    <input type="text" name="category2" id="category2" class="w-full px-3 py-2 mb-4 border rounded" value="<?php echo $category2; ?>">
                    <!-- Add other fields if needed -->
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Project</button>
                </form>
            <?php } else {
                echo "<p>Project not found.</p>";
            }
        } else {
            echo "<p>Project ID not provided.</p>";
        }
        ?>
    </div>
</body>
</html>
