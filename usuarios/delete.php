<?php

include '../db.php';
session_start(); 


if(isset($_GET["id"]) && !empty($_GET["id"])){
    // Get hidden input value
    $id = $_GET["id"];
	$id_user = $_SESSION['login_user'];
	
	$query = "SELECT
			id
			FROM usuarios
			WHERE id = '$id' and id!='$id_user'";
		if($result = mysqli_query($conn, $query)){
			if(mysqli_num_rows($result) > 0){
				$query = "UPDATE usuarios SET ativo='0'
				where id='$id'";
				$result = mysqli_query($conn, $query);
				header("location:../dashboard.php?sucesso=Usuário alterado.");
			}
			else{
				header("location:../dashboard.php?erro=Você não pode excluir este usuário.");
			}
		}
}
		
?>