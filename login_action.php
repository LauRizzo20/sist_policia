<?php
session_start();

include('db_config.php');

$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass = mysqli_real_escape_string($conn,$_POST['pass']);

$sql = "SELECT * FROM `user` WHERE `email`= '$email' AND `password`= '$pass'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

if($count == 1) {
    echo 'exito';
    $_SESSION['id'] = $row['id'];
 }else {
    echo "error";
 }

$conn->close();
?>