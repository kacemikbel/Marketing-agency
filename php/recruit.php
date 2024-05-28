<?php


include('./connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     

    $stmt = $conn->prepare("INSERT INTO recruit (email, phone, cv_filename, image_filename) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $phone, $cv_filename, $image_filename);

    
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    
    $cv_filename = "";
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $cv_filename = basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/" . $cv_filename); 
    }

    
    $image_filename = "";
    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $image_filename = basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], "./uploads/" . $image_filename); 
    }

    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $conn->close();
}
?>
