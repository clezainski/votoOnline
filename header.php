<?php
if(time() - $_SESSION['timestamp'] > 60) { 
    echo"<script>alert('Sessão expirada!');</script>";
    unset($_SESSION['login_user'], $_SESSION['login_name'], $_SESSION['timestamp'], $_SESSION['login_admin']);
    session_destroy();
    header("refresh:1 ; http://localhost/votoOnline/index.php");
    exit;
} 
else{
	$_SESSION['timestamp'] = time();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script> 
	
</head>

<body>
    <ul id="dropdown" class="dropdown-content">
        <li><a href="http://localhost/votoOnline/logout.php">Sair</a></li>        
        <li class="divider"></li>
        <li><a href="http://localhost/votoOnline/usuarios/change_password.php">Alterar senha</a></li>
    </ul>

    <nav class="indigo lighten-1 nav-extended" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="http://localhost/votoOnline/dashboard.php" class="brand-logo">Voto Online</a>
            <ul class="right hide-on-med-and-down">                
                <li><a class = "dropdown-button" href = "#" data-activates = "dropdown"><?php  echo "Olá ".@$_SESSION['login_name']; ?><i class = "mdi-navigation-arrow-drop-down right"></i></a>	</li>
            </ul>            
        </div>

<?php } ?>