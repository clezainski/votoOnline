<?php
    include '../db.php';
    session_start();   
?>

<!DOCTYPE html>
<html>

	<?php 
		include '../header.php';
	?>
	</nav>
    <div class="section"></div>
    <main>
        <center>
            <div class="section"></div>
            
			<p align="center" style="color:blue;">
				<?php echo @$_GET['sucesso']; ?>
			</p>
            <div class="section"></div>			
            <div class="container" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
			<h4 class="text" align="left" style="color:indigo;">Novo usuário</h4><br>
                <form class="col s12" action="add.php" method="post">				
                    <div class="row">					
                        <div class="input-field col s6">
                            <input id="first_name" name="first_name" type="text" class="validate">
                            <label for="first_name">Nome</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" name="last_name" type="text" class="validate">
                            <label for="last_name">Sobrenome</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" class="validate">
                            <label for="email">E-mail</label>
							<small id="emailHelp" class="left form-text text-muted">Nós não iremos compartilhar seu e-mail com ninguém.</small>
							<p align="left" style="color:red">
								<?php echo @$_GET['erro']; ?>
							</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" name="password" type="password" class="validate">
                            <label for="password">Senha</label>							
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label>
								<input type="checkbox" id="admin" name="admin" value="1"/>
								<span>Administrador</span>
							  </label>
                        </div>
                    </div>					
                    <div class='right row'>
						<button type=button class="btn waves-effect waves-light red" onclick="location.href = '../dashboard.php';">Cancelar
							<i class="material-icons right">arrow_back</i>
						</button>
                        <button class="btn waves-effect waves-light indigo" type="submit" id="sub" name="sub">Enviar
							<i class="material-icons right">send</i>
						</button>
                    </div>
                </form>
            </div>
            </div>
        </center>
        <div class="section"></div>
        <div class="section"></div>
    </main>
</body>

<?php include '../footer.php';?>

</html>
