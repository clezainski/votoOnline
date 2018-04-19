
<!DOCTYPE html>
<html>
   <head>
      <title>Cadastro de Candidato</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <meta charset="utf-8"/>
	  <script src="//code.jquery.com/jquery.min.js"></script>
	  <script src="js/digitalKeyboard.js"></script>

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
	  
      <form id="formfoto" action="" method="post">
         <div class="container">
            <h1>Votar</h1>
            <div class="row">
			   <div class="col-sm">
			 
			   </div>
               <div class="col-sm">
                  <div class="form-group">
                     <label for="nome">Número do candidato:</label>
                     <input class="form-control" id="numero" type="text" placeholder="limit: 12" name="numero">				 
                  </div>
				  <input type="submit" value="Votar" id="sub" name="sub">
               </div>
               
            </div>
         </div>
      </form>
   </body>
   <script type="text/javascript">
    $("#numero").numKey({
        limit: 12,
        disorder: true
    });
</script>

</html>

<?php
    include './db.php';
    session_start();   

    if(isset($_POST['sub'])){
		$numero = $_POST['numero'];
		
		$query = "select * from candidatos where numero='$numero' and ativo='1'";
		$result = mysqli_query($conn, $query);
		$result=mysqli_fetch_array($result);
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $result["IMAGE"] ).'" height="200" width="200"/>';
		
}
    ?>