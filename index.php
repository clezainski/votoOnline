<?php
include 'db.php';
?>

<!DOCTYPE html>
  <html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>	  
    </head>
<body>
<nav class="indigo lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Voto Online</a>                        
    </div>
  </nav>
  <div class="section"></div>
  <main>
    <center>
      <!<img class="responsive-img" style="width: 250px;" src="src/text.gif" />
      <div class="section"></div>
	  <p align="center" style="color:orange;">
				<?php echo @$_GET['sucesso']; ?>
			</p>
			<p align="center" style="color:red">
				<?php echo @$_GET['erro']; ?>
			</p>
      <h5 class="indigo-text"><b>Login</b></h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post" action="login.php">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='email' id='email' />
                <label for='email'>Insira seu e-mail</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Insira sua senha</label>
              </div>              
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' id='sub' name='sub' class='col s12 btn btn-large waves-effect indigo'>Login</button>
              </div>
            </center>
          </form>
		  <div>			
		  </div>
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>
  
  <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
  <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script> 
</body>
<footer class="page-footer light-blue lighten-1" >
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Votação Online</h5>
                <p class="grey-text text-lighten-4">Participar da escolha de um representante da sua comunidade, cidade, estado ou país é ajudar a escrever a história da sociedade em que vivemos.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Alunos:</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3">Alain Cardoso</a></li>
                    <li><a class="grey-text text-lighten-3">Cleverson Lezainski</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2018 Direitos reservados
            <a class="grey-text text-lighten-4 right" href="http://up.com.br">CTUP</a>
        </div>
    </div>
</footer>
</html>