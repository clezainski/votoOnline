<?php
    include '../db.php';  
	session_start(); 

    if(isset($_POST['sub'])){
       $nome = $_POST['first_name'];
       $sobrenome = $_POST['last_name'];
	   $email = $_POST['email'];
       $senha = md5($_POST['password']); 
	   
	   if(!@$_POST['admin']){
		   $admin = 0;
	   }
	   else{
		   $admin = 1;
	   }
	   
	   $query = "select * from usuarios where email='$email' and ativo='1'";
	   $result = mysqli_query($conn, $query);
       $found_num_rows = mysqli_num_rows($result);

		if($found_num_rows == true ){
			header("location:new.php?erro=Cadastro não realizado. Email já cadastrado.");
		}
		else{
			$query = "INSERT INTO usuarios (nome, sobrenome, senha, email, ativo, admin, votou) 
			VALUES ('$nome', '$sobrenome', '$senha', '$email', '1', '$admin', '0')";
			$result = mysqli_query($conn, $query);
			header("location:new.php?sucesso=Usuário cadastrado.");
		}              
    }
	
	else{
	header("location:../dashboard.php");	
	}

	mysqli_close($conn);
    ?>