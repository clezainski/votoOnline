<?php
   include './db.php';
   session_start(); 
   
   $query = 'SELECT 
			  email,
			   nome, 
			   sobrenome, 
			   cpf,			    
			   cep, 
			   rua, 
			   numero, 
			   complemento, 
			   bairro, 
			   cidade, 
			   estado
			   FROM usuarios
		    ORDER BY id';
   
    $result = mysqli_query($conn, $query);	
   //$row = mysql_fetch_assoc($result);
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>PHP MySQL Query Data Demo</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <div id="container">
         <h1>Usuários</h1>
         <table class="table table-bordered table-condensed">
            <thead>
               <tr>
                  <th>Nome</th>
                  <th>Sobrenome</th>
                  <th>CPF</th>
               </tr>
            </thead>
            <tbody>
               <?php while ($row = mysqli_fetch_array($result)): ?>
               <tr>
                  <td><?php echo htmlspecialchars($row['nome']); ?></td>
                  <td><?php echo htmlspecialchars($row['sobrenome']); ?></td>
                  <td><?php echo htmlspecialchars($row['cpf']); ?></td>
               </tr>
               <?php endwhile; ?>
            </tbody>
         </table>
   </body>
   </div>
</html>