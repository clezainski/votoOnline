<?php

include '../db.php';
session_start(); 


if($_SESSION['login_admin']==1){
    $id = $_GET["id"];
	
	$query = "UPDATE votacao SET status='$id'
			where id='1'";
			$result = mysqli_query($conn, $query);
			if($id==1){
				header("location:../dashboard.php?sucesso=Votação aberta.<br>Os votos computados foram eliminados.");
				$query = "UPDATE candidatos, usuarios SET candidatos.quant_voto='0',usuarios.votou='0' WHERE candidatos.ativo='1' and usuarios.ativo='1'";
				$result = mysqli_query($conn, $query);
					
			}
			else{
				header("location:../dashboard.php?sucesso=Votação encerrada.");
			}
}
else{
	header("location:../dashboard.php?erro=Você não pode alterar os <br>status da votação.");
}		
?>