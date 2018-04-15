<?php
session_start();

if(@!$_SESSION["login_user"]){
 echo " <h2>Login Frist </h2>";
 header("refresh:2 ; index.php");

}else{
 echo "<h1>Welcome ".@$_SESSION['login_user'].'</h1>';
 echo "<a href='logout.php' style='color:red'> Logout </a>";
 }

?>﻿