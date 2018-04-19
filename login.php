<?php
   include './db.php';
   session_start();   

   if(isset($_POST['sub'])){
     $usuario = $_POST['usuario'];
     $password = md5($_POST['senha']);

     $query = "select * from usuarios where nome='$usuario'";
     $result = mysqli_query($conn, $query);
     $found_num_rows = mysqli_num_rows($result);

     if($found_num_rows == true ){
	   $dbarray = mysqli_fetch_array($result, MYSQLI_ASSOC);

	   if($password == $dbarray["SENHA"]){
		   $_SESSION['login_user']=$usuario;
			  header("location: welcome.php");
		   #  header("location:index.php?success=Login Sucessfull");
		   #  header("refresh: 3; url=welcome.php");
	   }
	   else{
			header("location:index.php?invalido=Senha incorreta. <br>Tente novamente.");
			echo htmlspecialchars($dbarray['senha']);
			echo htmlspecialchars($password);
		} 
		 }
	else{
		header("location:index.php?invalido=Usuário incorreto. <br>Tente novamente.");
	}
   }
   mysqli_close($conn);
   
   ?>