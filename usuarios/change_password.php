<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<?php
include '../header.php';
?>
	</nav>
    <div class="section"></div>
    <main>
        <center> 
            
            <div class="container" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
			<div class="section"></div>				
			<h4 class="text" align="left" style="color:indigo;">Alterar Senha</h4><br>
                <form class="col s12" action="update_password.php" method="post" >			
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="password_old" name="password_old" type="password" class="validate">
                            <label for="password">Senha antiga</label>
							<div align="left" style="color:red">
							<?php echo @$_GET['erro']; ?>
							</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="password_new" name="password_new" type="password" class="validate">
                            <label for="password">Nova senha</label>
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

<?php
include '../footer.html';
?>

</html>
