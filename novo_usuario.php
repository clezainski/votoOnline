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
                     <input type="text" class="form-control" name="nome">
                  </div>
                  <div class="form-group">
                     <label for="lname">Sobrenome:</label>
                     <input type="text" class="form-control" name="sobrenome">
                  </div>
                  <div class="form-group">
                     <label for="cpf">C.P.F.:</label>
                     <input type="text" class="form-control" name="cpf">
                  </div>
                  <div class="form-group">
                     <label for="email">E-mail:</label>
                     <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                     <small id="emailHelp" class="form-text text-muted">Nós não iremos compartilhar seu e-mail com ninguém.</small>
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
      $cpf = $_POST['cpf'];      
    
      $query = "INSERT INTO usuarios (nome, sobrenome, cpf, email, cep, rua, numero, complemento, bairro, cidade, estado, senha) 
	  VALUES ('$nome', '$sobrenome', '$cpf', '$email', '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cpf')";
      $result = mysqli_query($conn, $query);      
   }
   
   ?>