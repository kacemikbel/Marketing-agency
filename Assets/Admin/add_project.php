<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../php/connectdb.php';

$title = $description = $image_url = $category1 = $category2 = "";
$title_err = $description_err = $image_url_err = $category1_err = $category2_err = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $category1 = $_POST['category1'];
    $category2 = $_POST['category2'];

    echo "Title: $title<br>Description: $description<br>Image URL: $image_url<br>Category 1: $category1<br>Category 2: $category2<br>";

    $sql = "INSERT INTO projects (title, description, image_url, category1, category2) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sssss", $title, $description, $image_url, $category1, $category2);

    if ($stmt->execute()) {
        echo "New project added successfully";
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
    <title>Add Project</title>
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">

<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-md p-8 shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
        <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Add Project</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1" for="title">Title</label>
                <input type="text" name="title" id="title" class="form-input rounded-md border-gray-400 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" value="<?php echo htmlspecialchars($title); ?>">
                <span class="text-red-500"><?php echo $title_err; ?></span>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1" for="description">Description</label>
                <textarea name="description" id="description" class="form-textarea rounded-md border-gray-400 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"><?php echo htmlspecialchars($description); ?></textarea>
                <span class="text-red-500"><?php echo $description_err; ?></span>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1" for="image_url">Image URL</label>
                <input type="text" name="image_url" id="image_url" class="form-input rounded-md border-gray-400 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" value="<?php echo htmlspecialchars($image_url); ?>">
                <span class="text-red-500"><?php echo $image_url_err; ?></span>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1" for="category1">Category 1</label>
                <input type="text" name="category1" id="category1" class="form-input rounded-md border-gray-400 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" value="<?php echo htmlspecialchars($category1); ?>">
                <span class="text-red-500"><?php echo $category1_err; ?></span>
            </div>
           
            <div class="mb-6">
    <label class="block text-sm font-semibold text-gray-700 mb-1" for="category2">Category 2</label>
    <input type="text" name="category2" id="category2" class="form-input rounded-md border-gray-400 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" value="<?php echo htmlspecialchars($category2); ?>">
    <span class="text-red-500"><?php echo $category2_err; ?></span>
</div>
<div class="flex justify-center">
    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-3 px-6 rounded-md mr-2 transition duration-300 ease-in-out">Submit</button>
    <a href="projects.php" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-3 px-6 rounded-md transition duration-300 ease-in-out">Cancel</a>
</div>
</form>
</div>
</div>

</body>
</html>
