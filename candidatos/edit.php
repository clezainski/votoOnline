<?php

include '../db.php';
session_start(); 


if(isset($_GET["id"]) && !empty($_GET["id"])){
    // Get hidden input value
    $id = $_GET["id"];
	
	$query = "SELECT
			id,			
			nome, 
			sobrenome,
			numero,
			ativo
			FROM candidatos
			WHERE id = '$id'";
		if($result = mysqli_query($conn, $query)){
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result)) {
				$nome = $row['nome'];
				$sobrenome = $row['sobrenome'];
				$numero = $row['numero'];
				}
			}
			else{
				header("location:../dashboard.php");
			}
		}
}
		
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
            <div class="section"></div>			
            <div class="container" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
			<h4 class="text" align="left" style="color:indigo;">Alterar usuário</h4><br>
                <form class="col s12" action="update.php" method="post" enctype="multipart/form-data">				
                    <div class="row">
						<input type="hidden" name="id" value="<?php echo $id;?>">
                        <div class="input-field col s6">
                            <input id="first_name" name="first_name" type="text" value="<?php echo $nome;?>" class="validate">
                            <label for="first_name">Nome</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" name="last_name" type="text" value="<?php echo $sobrenome;?>" class="validate">
                            <label for="last_name">Sobrenome</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="number" name="number" type="text" value="<?php echo $numero;?>" class="validate">
                            <label for="number">Número</label>
							<p align="left" style="color:red">
								<?php echo @$_GET['erro']; ?>
							</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field col s6">
						  <div class="btn">
							<span>Foto</span>
							<input type="file" name="image" id="image">
						  </div>
						  <div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						  </div>
						</div>
                    </div>                    					
                    <div class='right row'>
						<button type=button class="btn waves-effect waves-light red" onclick="history.go(-1)">Cancelar
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

<?php include '../footer.html';?>

</html>