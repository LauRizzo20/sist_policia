<?php
   include('db_config.php');
   session_start();
   
   $user_check = $_SESSION['id'];
   
   $ses_sql = mysqli_query($conn,"SELECT * from user where id = '$user_check' ");
   
   $row_usr = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $dni_usr = $row_usr['id'];
   $name_usr = $row_usr['email'];
   
   if(!isset($_SESSION['id'])){
      header("location:index.php");
      die();
   }
?>