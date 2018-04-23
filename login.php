<?php
   include './db.php';
   session_start();   

   if(isset($_POST['sub'])){
     $email = $_POST['email'];
     $password = md5($_POST['password']);

     $query = "select * from usuarios where email='$email' and ativo='1'";
     $result = mysqli_query($conn, $query);
     $found_num_rows = mysqli_num_rows($result);

     if($found_num_rows == true ){
	   $dbarray = mysqli_fetch_array($result, MYSQLI_ASSOC);

	   if($password == $dbarray["SENHA"]){
		   $_SESSION['login_user']=$dbarray["ID"];
		   $_SESSION['login_name']=$dbarray["NOME"];
		   $_SESSION['login_admin']=$dbarray["ADMIN"];
		   $_SESSION['timestamp'] = time();
		   header("refresh: 1; url=dashboard.php");
	   }
	   else{
			header("location:index.php?erro=Senha incorreta. <br>Tente novamente.");
		} 
		 }
	else{
		header("location:index.php?erro=Usuário incorreto. <br>Tente novamente.");
	}
   }
   mysqli_close($conn);
   
   ?>