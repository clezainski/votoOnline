<?php
include '../db.php';
session_start();

if (isset($_POST['sub'])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $id         = $_POST['id'];
        $image      = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $nome       = $_POST['first_name'];
        $sobrenome  = $_POST['last_name'];
        $numero     = $_POST['number'];
        
        $query          = "select * from candidatos where numero='$numero' and id!='$id'";
        if ($result = mysqli_query($conn, $query)) {
			if (mysqli_num_rows($result) > 0) {
				header("location:edit.php?erro=Candidato não alterado. Número já cadastrado.&id=".$id."&last_name=".$sobrenome."nome=".$nome."&number=".$numero);
			} else {
				$query          = "select * from candidatos where id='$id' and quant_voto='0'";
				$result = mysqli_query($conn, $query);
				if (mysqli_num_rows($result) != 0) {
				
					echo $row['quant_voto'];
					$sql  = "UPDATE candidatos SET nome='$nome', sobrenome='$sobrenome', numero='$numero', image='$imgContent'
						where id='$id'";
					$result2 = mysqli_query($conn, $sql);
					header("location:../dashboard.php?sucesso=Candidato alterado.");				
				}
				else{
					header("location:../dashboard.php?erro=Não foi possível alterar este candidato.<br>Candidato já foi votado.");				
				}
			}
		}        
        
    } else {
        header("location:../dashboard.php?erro=Erro ao alterar este candidato.");
    }
}

?>