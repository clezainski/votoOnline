<?php
    include '../db.php';  
	session_start(); 

    if(isset($_GET["id"]) && !empty($_GET["id"])){
	   $id_cand = $_GET['id'];
	   $user = $_SESSION['login_user']; 
	   
	   $query = "select * from usuarios INNER JOIN votacao where usuarios.id='$user' and votacao.status='1'";
	   $result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			$query = "UPDATE usuarios SET votou='1'
			where id='$user'";
			$result = mysqli_query($conn, $query);
			
			$query = "select * from candidatos where id='$id_cand'";
			$result = mysqli_query($conn, $query);
			$found_num_rows = mysqli_num_rows($result2);
			
			if(mysqli_num_rows($result) > 0){
				$query = "UPDATE candidatos SET quant_voto=quant_voto+1
				where id='$id_cand'";
				$result = mysqli_query($conn, $query);
				
				header("location:../dashboard.php?sucesso=Voto registrado.");
			}
		}
		else{			
			header("location:../dashboard.php?erro=Voto não registrado.");
		}              
    }else{
	header("location:../dashboard.php");	
	}

	mysqli_close($conn);
    ?>