<?php 
include('./connectdb.php');

$stmt = $conn->prepare("INSERT INTO `user_submission` (username, email, telephone, message, `option`) VALUES (?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("sssss", $username, $email, $telephone, $message, $option);

$username = $_POST['username'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$message = $_POST['message'];


if(isset($_POST['option']) && is_array($_POST['option'])) {
    $options = $_POST['option']; 


    foreach ($options as $option) {
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error executing query: " . $stmt->error;
        }
    }
} else {
    echo "No options selected.";
}

$stmt->close();
$conn->close();
?>
