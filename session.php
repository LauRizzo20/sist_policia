<?php
   include('db_config.php');
   session_start();
   
   $user_check = $_SESSION['id'];
   
   $ses_sql = mysqli_query($conn,"SELECT * from user where id = '$user_check' ");
   
   $row_usr = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $dni_usr = $row_usr['id'];
   $name_usr = $row_usr['email'];
   $cargo = $row_usr['id_prof'];

   if ($cargo !=0){
      $prof_sql = "SELECT * FROM `profesores` WHERE id_prof = '$cargo'";
      $prof_result = mysqli_query($conn, $prof_sql);
      $prof_row = mysqli_fetch_array($prof_result);
   };
   
   if(!isset($_SESSION['id'])){
      header("location:index.php");
      die();
   }
?>