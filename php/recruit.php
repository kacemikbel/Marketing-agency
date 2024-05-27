<?php
include('./connectdb.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Initialize variables for file content and filename
    $cv_filename = null;
    $image_filename = null;
    $cv_content = null;
    $image_content = null;

    // Handle CV file upload
    if (isset($_FILES['file'])) {
        if ($_FILES['file']['error'] == 0) {
            $cv_filename = $_FILES['file']['name']; // Get the filename
            $cv_content = file_get_contents($_FILES['file']['tmp_name']); // Get the file contents
        } else {
            echo "Error uploading CV file: " . $_FILES['file']['error'];
        }
    } else {
        echo "No CV file uploaded.";
    }

    // Handle image file upload
    if (isset($_FILES['image'])) {
        if ($_FILES['image']['error'] == 0) {
            $image_filename = $_FILES['image']['name']; // Get the filename
            $image_content = file_get_contents($_FILES['image']['tmp_name']); // Get the file contents
        } else {
            echo "Error uploading image file: " . $_FILES['image']['error'];
        }
    } else {
        echo "No image file uploaded.";
    }

    // Insert data into database
    $sql = "INSERT INTO recruit (email, phone, cv_filename, cv_content, image_filename, image_content) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssbbsb", $email, $phone, $cv_filename, $cv_content, $image_filename, $image_content); // Bind filenames and contents

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
