
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Eleitor</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="utf-8"/>
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
					<label for="name">Nome:</label>
					<input type="text" class="form-control" id="name">
				</div>
				<div class="form-group">
					<label for="lname">Sobrenome:</label>
					<input type="text" class="form-control" id="lname">
				</div>
				<div class="form-group">
					<label for="cpf">C.P.F.:</label>
					<input type="text" class="form-control" id="cpf">
				</div>
				<div class="form-group">
					<label for="birthd">Data de Nascimento:</label>
					<input type="text" class="form-control" id="birthd">
				</div>
				<div class="form-group">
					<label for="email">E-mail:</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<small id="emailHelp" class="form-text text-muted">Nós não iremos compartilhar seu e-mail com ninguém.</small>
				</div>
				<div class="form-group">
					<label for="password">Senha:</label>
					<input type="password" class="form-control" id="password">
				</div>
			</div>
			<div class="col">
				<h4>Endereço</h4>
				<div class="form-group">
					<label for="cep">C.E.P.:</label>
					<input type="text" class="form-control" id="cep">
				</div>
				<div class="form-group">
					<label for="rua">Rua:</label>
					<input type="text" class="form-control" id="rua">
				</div>
				<div class="form-group">
					<label for="num">Número:</label>
					<input type="text" class="form-control" id="num">
				</div>
				<div class="form-group">
					<label for="complem">Complemento:</label>
					<input type="text" class="form-control" id="complem">
				</div>
				<div class="form-group">
					<label for="bairro">Bairro:</label>
					<input type="bairro" class="form-control" id="bairro">
				</div>
				<div class="form-group">
					<label for="cidade">Cidade:</label>
					<input type="cidade" class="form-control" id="cidade">
				</div>
				<div class="form-group">
					<label for="estado">Estado:</label>
					<input type="estado" class="form-control" id="estado">
				</div>
				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</div>
		</div>
	</div>
</form>


</body>
</html>


<?php
   include("config.php");
 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      /* $email = mysqli_real_escape_string($db,$_POST['email']); */
      $senha = $_POST['password'];
	  $nome = $_POST['name'];
	  /* $snome = mysqli_real_escape_string($db, $_POST['lname']);
	  $cpf = mysqli_real_escape_string($db, $_POST['cpf']);
	  $dataniver = mysqli_real_escape_string($db, $_POST['birthd']);
	  $rua = mysqli_real_escape_string($db, $_POST['rua']);
	  $numero = mysqli_real_escape_string($db, $_POST['num']);
	  $compl = mysqli_real_escape_string($db, $_POST['complem']);
	  $bairro = mysqli_real_escape_string($db, $_POST['bairro']);
	  $cidade = mysqli_real_escape_string($db, $_POST['cidade']);
	  $estado = mysqli_real_escape_string($db, $_POST['estado']); */
	  
	 $q = "INSERT INTO `eleitor`(`username`, `password`) VALUES ('".$nome."', '".$senha."')";

	if ($db->query($q) === TRUE) {
		echo "New record created successfully";
		echo $nome;
	} else {
		echo "Error: " . $q . "<br>" . $db->error;
	}
   }


?>