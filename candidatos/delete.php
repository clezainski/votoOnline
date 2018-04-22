<?php

include '../db.php';
session_start();


if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Get hidden input value
    $id = $_GET["id"];
    
    $query = "SELECT
			id
			FROM candidatos
			WHERE id = '$id' and quant_voto='0'";
    if ($result = mysqli_query($conn, $query)) {
        if (mysqli_num_rows($result) > 0) {
            $query  = "UPDATE candidatos SET ativo='0'
				where id='$id'";
            $result = mysqli_query($conn, $query);
            header("location:../dashboard.php?sucesso=Candidato excluído com sucesso.");
        } else {
            header("location:../dashboard.php?erro=Não é possível excluir este candidato.<br>Candidato já possui votos.");
        }
    }
}

?>