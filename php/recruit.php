<?php
include('./connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $cv_filename = "";
    $image_filename = "";

    $upload_dir = "./uploads/";

    // Check if uploads directory exists, if not, create it
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Handle CV file upload
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $cv_temp_name = $_FILES["file"]["tmp_name"];
        $cv_filename = basename($_FILES["file"]["name"]);
        $cv_target_file = $upload_dir . $cv_filename;
        
        // Validate file type (e.g., PDF, DOC, DOCX)
        $allowed_cv_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        if (in_array($_FILES["file"]["type"], $allowed_cv_types)) {
            if (move_uploaded_file($cv_temp_name, $cv_target_file)) {
                // File upload successful
            } else {
                echo "Error uploading CV.";
                exit;
            }
        } else {
            echo "Invalid CV file type.";
            exit;
        }
    }

    // Handle Image/Avatar file upload
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $image_temp_name = $_FILES["image"]["tmp_name"];
        $image_filename = basename($_FILES["image"]["name"]);
        $image_target_file = $upload_dir . $image_filename;
        
        // Validate file type (e.g., PNG, JPEG)
        $allowed_image_types = ['image/png', 'image/jpeg'];
        if (in_array($_FILES["image"]["type"], $allowed_image_types)) {
            if (move_uploaded_file($image_temp_name, $image_target_file)) {
                // File upload successful
            } else {
                echo "Error uploading image.";
                exit;
            }
        } else {
            echo "Invalid image file type.";
            exit;
        }
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO recruit (email, phone, cv_filename, image_filename) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $phone, $cv_filename, $image_filename);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
