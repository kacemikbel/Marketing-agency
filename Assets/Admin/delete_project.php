<?php
require '../../php/connectdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve project ID from form
    $project_id = $_POST['project_id'];

    // Prepare SQL statement
    $sql = "DELETE FROM projects WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $project_id);
    
    // Execute SQL statement
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: dashboard.php"); // Redirect to dashboard after successful deletion
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
    <title>Delete Project</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <h1>Delete Project</h1>
    <form action="delete_project.php" method="POST">
        <label for="project_id">Project ID:</label><br>
        <input type="text" id="project_id" name="project_id" required><br>
        <button type="submit">Delete Project</button>
    </form>
</body>
</html>
