<?php
include '../db.php';
session_start();

if (isset($_POST['sub'])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $image      = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $nome       = $_POST['first_name'];
        $sobrenome  = $_POST['last_name'];
        $numero     = $_POST['number'];
        
        $query          = "select * from candidatos where numero='$numero'";
        $result         = mysqli_query($conn, $query);
        $found_num_rows = mysqli_num_rows($result);
        
        if ($found_num_rows == true) {
            header("location:../dashboard.php?erro=Candidato não cadastrado. Número já existe.");
        } else {
            $query  = "INSERT INTO candidatos (nome, sobrenome, image, numero, ativo, quant_voto) 
				VALUES ('$nome', '$sobrenome', '$imgContent', '$numero', '1', '0')";
            $result = mysqli_query($conn, $query);
            header("location:../dashboard.php?sucesso=Novo candidato cadastrado.");
            
        }
    } else {
        header("location:../dashboard.php?erro=Erro ao cadastrar este candidato.");
    }
}
else{
	header("location:../dashboard.php");	
	}

mysqli_close($conn);
?>