<?php
include('../../php/connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['image']) && !empty($_POST['image']) && isset($_POST['category1']) && !empty($_POST['category1']) && isset($_POST['category2']) && !empty($_POST['category2'])) {
        
        
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $image = mysqli_real_escape_string($conn, $_POST['image']);
        $category1 = mysqli_real_escape_string($conn, $_POST['category1']);
        $category2 = mysqli_real_escape_string($conn, $_POST['category2']);

        
        $sql = "UPDATE projects SET title = '$title', description = '$description', image_url = '$image', category1 = '$category1', category2 = '$category2' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Project updated successfully";
        } else {
            echo "Error updating project: " . $conn->error;
        }
    } else {
        echo "All fields are required";
    }
}
?>
