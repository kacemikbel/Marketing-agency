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

$success = false;

if (isset($_POST['option']) && is_array($_POST['option'])) {
    $options = $_POST['option']; 

    foreach ($options as $option) {
        if ($stmt->execute()) {
            $success = true;
        } else {
            echo "Error executing query: " . $stmt->error;
        }
    }
} else {
    echo "No options selected.";
}

$stmt->close();
$conn->close();

if ($success) {
    echo '<div id="successMessage" style="display: none; text-align: center; margin-top: 20px;">
            <div style="display: inline-block; padding: 10px 20px; background-color: #38a169; color: white; border-radius: 5px; animation: fadeIn 2s;">
                Success! Your application has been submitted.
            </div>
          </div>
          <script>
              document.getElementById("successMessage").style.display = "block";
          </script>';
}
?>
