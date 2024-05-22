<?php
include('./connectdb.php');

extract($_POST);


if(isset($email) && isset($phone) && isset($file) && isset($image)  ){
    $sql = "INSERT INTO `recruit` 
VALUES ( '$email', '$phone','$file','$imagage')";
}
$res = mysqli_query($conn, $sql);
if ($res) {
   header('location:../recrut.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>