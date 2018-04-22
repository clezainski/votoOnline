<?php
    include '../db.php';  
	session_start(); 

    if(isset($_POST['sub'])){
	   $id = $_POST['id'];
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
	   
	   $query = "select * from usuarios where email='$email' and ativo='1' and id!='$id'";
	   $result = mysqli_query($conn, $query);
       $found_num_rows = mysqli_num_rows($result);

		if($found_num_rows == true ){
			header("location:../dashboard.php?erro=Cadastro não realizado. Email já cadastrado.");
		}
		else{
			$query = "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', senha='$senha', email='$email', admin='$admin'
			where id='$id'";
			$result = mysqli_query($conn, $query);
			header("location:../dashboard.php?sucesso=Usuário alterado.");
		}              
    }

	mysqli_close($conn);
    ?>