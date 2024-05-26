

<?php

include('./connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    
    $cv_filename = '';
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $cv_filename = basename($_FILES['file']['name']);
        $cv_target = "uploads/cv/" . $cv_filename;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $cv_target)) {
            
        } else {
            echo "Error uploading CV file.";
        }
    }

    
    $image_filename = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_filename = basename($_FILES['image']['name']);
        $image_target = "uploads/images/" . $image_filename;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_target)) {
          
        } else {
            echo "Error uploading image file.";
        }
    }

    
    $sql = "INSERT INTO recruit (email, phone, cv_filename, image_filename) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $email, $phone, $cv_filename, $image_filename);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
