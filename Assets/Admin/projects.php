<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        
        .card {
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Manage Projects</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            // Include database connection script
            include('../../php/connectdb.php');

            // Prepare and execute the SQL query to fetch projects
            $sql = "SELECT id, title, description, image, tags FROM projects";
            $result = $conn->query($sql);

            // Check if there are any results
            if ($result->num_rows > 0) {
                // Loop through each project and display it
                while($row = $result->fetch_assoc()) {
                    $image = htmlspecialchars($row['image']);
                    $title = htmlspecialchars($row['title']);
                    $description = htmlspecialchars($row['description']);
                    $tags = explode(',', $row['tags']);
                    ?>
                    <div class="bg-white rounded-lg overflow-hidden shadow-md card">
                        <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="w-full h-64 object-cover object-center">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-2"><?php echo $title; ?></h2>
                            <p class="text-gray-600 mb-4"><?php echo $description; ?></p>
                            <div class="flex flex-wrap">
                                <?php foreach ($tags as $tag) { ?>
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?php echo htmlspecialchars($tag); ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <p>No projects found.</p>
            <?php } ?>
        </div>
        <div class="mt-8 flex justify-between">
            <a href="add_project.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Project</a>
            <a href="delete_project.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Project</a>
        </div>
    </div>
</body>
</html>
