<?php
   include './db.php';
   session_start();
   
   
   if(isset($_POST['sub'])){
     $username = $_POST['usuario'];
     $password = $_POST['senha'];
   
     $query = "select * from eleitor where username='$username' and password='$password'";
     $exe_query = mysqli_query($conn, $query);
     $found_num_rows = mysqli_num_rows($exe_query);
   
     if($found_num_rows == true ){
      $_SESSION['login_user']=$username;
      header("location: welcome.php");
   #  header("location:index.php?success=Login Sucessfull");
   #  header("refresh: 3; url=welcome.php");
   
     }else{
      header("location:index.php?invalido=Senha ou nome de usuário incorretos. <br>Tente novamente.");
     }
   }
   ?>﻿