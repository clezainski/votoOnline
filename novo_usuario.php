<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Eleitor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8" />
</head>

<body>
    <div id="navbar">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <class="d-inline-block align-top" alt="">
                    Voto Online
            </a>
        </nav>
    </div>
    <form action="" method="post">
        <div class="container">
            <h1>Cadastro de Eleitor</h1>
            <div class="row">
                <div class="col">
                    <h4>Informações Pessoais</h4>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="form-group">
                        <label for="sobrenome">Sobrenome:</label>
                        <input type="text" class="form-control" name="sobrenome">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Nós não iremos compartilhar seu e-mail com ninguém.</small>
                    </div>
                    <div class="form-group">
                        <label for="senha">Password</label>
                        <input type="password" name="senha" class="form-control">
                    </div>
                    <input type="submit" value="Entrar" id="sub" name="sub">
                </div>
            </div>
        </div>
    </form>
</body>

</html>
<?php
    include './db.php';
    session_start();   

    if(isset($_POST['sub'])){
       $nome = $_POST['nome'];
       $sobrenome = $_POST['sobrenome'];
	   $email = $_POST['email'];
       $senha = md5($_POST['senha']); 

	  echo "Seu nome: $nome";	   

       $query = "INSERT INTO usuarios (nome, sobrenome, senha, email) 
		VALUES ('$nome', '$sobrenome', '$senha', '$email')";
       $result = mysqli_query($conn, $query);      
    }

	mysqli_close($conn);

    ?>