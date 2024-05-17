<?php

include('./connectdb.php');

extract($_POST);


if(isset($name) && isset($email) && isset($message)  ){
    $sql = "INSERT INTO `Comments` 
VALUES ( '$email', '$message','$name')";
}
$res = mysqli_query($conn, $sql);
if ($res) {
   header('location:../blog.details.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
?>
