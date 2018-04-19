<?php
session_start();

if(@!$_SESSION["login_user"]){
 echo " <h2>Forbidden 403</h2></br>
	<a>You don't have permission to access / on this server.<a>";
 header("refresh:2 ; index.php");

}else if ($_SESSION["login_admin"] == true) {
	?>
    <!doctype html>
    <html lang='pt-br'>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/menu.css">
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="js/menu.js"></script>
        <title>Painel de controle - ADMIN</title>
    </head>

    <body>

        <div id='cssmenu'>
            <ul>
                <li><a href='#'><span>Voto Online</span></a></li>
                <li class='has-sub'><a href='#'><span>Usuários</span></a>
                    <ul>
                        <li class='has-sub'><a href='novo_usuario.php'><span>Novo</span></a>
                        </li>
                        <li class='has-sub'><a href='#'><span>Alterar</span></a>
                        </li>
                        <li class='has-sub'><a href='listar_usuarios.php'><span>Listar todos</span></a>
                        </li>
                    </ul>
                </li>
                <li class='has-sub'><a href='#'><span>Candidatos</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Novo</span></a>
                        </li>
                        <li class='has-sub'><a href='#'><span>Alterar</span></a>
                        </li>
                        <li class='has-sub'><a href='#'><span>Listar todos</span></a>
                        </li>
                    </ul>
                </li>
                <li class='has-sub'><a href='#'><span>Votação</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Iniciar votação</span></a>
                        </li>
                        <li class='has-sub'><a href='#'><span>Encerrar votação</span></a>
                        </li>
                        <li class='has-sub'><a href='#'><span>Gerenciar dados</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href='#'><span>About</span></a></li>
                <li class='last has-sub'><a><span><?php  echo "Bem vindo ".@$_SESSION['login_user']; ?></span></a>
                    <ul>
                        <li class='has-sub'><a href='alterar_senha.php'><span> Alterar senha </span></a></li>
                        <li class='has-sub'><a href='logout.php' style='color:red'><span> Sair </span></a></li>
                    </ul>
                </li>

            </ul>
        </div>

    </body>
    <html>

    <?php
}
else{
	echo " <h2>Você dever ser administrador para acessar esta página. </h2>";
	header("refresh:2 ; index.php");
}
?>