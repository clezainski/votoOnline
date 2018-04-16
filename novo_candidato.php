<!DOCTYPE html>
<html>
   <head>
      <title>Cadastro de Candidato</title>
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
                     <label for="nome">Nome:</label>
                     <input type="text" class="form-control" name="nome">
                  </div>
                  <div class="form-group">
                     <label for="sobrenome">Sobrenome:</label>
                     <input type="text" class="form-control" name="sobrenome">
                  </div>
                  <div class="form-group">
                     <label for="numero">Número:</label>
                     <input type="numero" class="form-control" name="numero">
                  </div>
				  <input type="submit" value="Cadastrar" id="sub" name="sub">
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
	   $numero = $_POST['numero'];   
     
       $query = "INSERT INTO candidatos (nome, sobrenome, numero, ativo) 
		VALUES ('$nome', '$sobrenome', '$numero', '1')";
       $result = mysqli_query($conn, $query);      
    }
    
    ?>