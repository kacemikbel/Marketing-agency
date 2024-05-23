<?php
require '../../php/connectdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $title = $_POST['title'];
    $description = $_POST['description'];
    // Add more fields as needed

    // Prepare SQL statement
    $sql = "INSERT INTO projects (title, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $title, $description);
    
    // Execute SQL statement
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: dashboard.php"); // Redirect to dashboard after successful addition
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <h1>Add Project</h1>
    <form action="add_project.php" method="POST">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <!-- Add more input fields for other project details -->
        <button type="submit">Add Project</button>
    </form>
</body>
</html>
