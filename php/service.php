<?php
include('./connectdb.php');

extract($_POST);
print_r($_POST);
/*
if(isset($username) && isset($email) && isset($telephone) && isset($message) && isset($option)  ){
    $sql = "INSERT INTO `user-sabmittions` 
VALUES ( '$username', '$email','$tel','$ùessage','$option')";
}


$res = mysqli_query($conn, $sql);
if ($res) {
   header('location:../php/service.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }*/

?>
