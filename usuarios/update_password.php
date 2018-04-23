<?php
include '../db.php';
session_start();

if (isset($_POST['sub'])) {
    $id           = $_SESSION['login_user'];
    $antiga_senha = md5($_POST['password_old']);
    $nova_senha   = md5($_POST['password_new']);
    
    
    $query          = "select * from usuarios where senha='$antiga_senha' and id!='$id'";
    $result         = mysqli_query($conn, $query);
    $found_num_rows = mysqli_num_rows($result);
    
    if ($found_num_rows == true) {
        $query  = "UPDATE usuarios SET senha='$nova_senha'
			where id='$id'";
        $result = mysqli_query($conn, $query);
        session_destroy();
        header("location:../index.php?sucesso=Senha altera com sucesso.");
    } else {
        header("location:change_password.php?erro=Senha não confere.");
    }
}
else{
	header("location:../dashboard.php");	
}

mysqli_close($conn);
?>