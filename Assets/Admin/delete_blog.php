<?php
require '../../php/connectdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $sql = "DELETE FROM blog_posts WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            echo "Blog post deleted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
