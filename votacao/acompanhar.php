<?PHP 
	include '../db.php';
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<style type="text/css">
		.wrapper {
			width: 650px;
			margin: 0 auto;
		}
		
		.page-header h2 {
			margin-top: 0;
		}
		
		table tr td:last-child a {
			margin-right: 15px;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>

	<?php

	include '../header.php';
	
	?>
	</nav>
	<?php
	
	$query = "SELECT
		status
		FROM votacao
		WHERE id = '1'";
	if($result = mysqli_query($conn, $query)){
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)) {
			$status = $row['status'];
			}
			
			if($status == 1){
				?>			
			
			<div class="wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="page-header clearfix">
								<h4 class="pull-left">Votação</h4>
							</div>
							<?php
							$query = "SELECT
								id,
								nome, 
								sobrenome, 
								numero,
								ativo,
								image,
								quant_voto
								FROM candidatos
								WHERE ativo='1'
								ORDER BY quant_voto";
							if($result = mysqli_query($conn, $query)){
								if(mysqli_num_rows($result) > 0){
									echo "<table class='table table-bordered table-striped'>";
										echo "<thead>";
											echo "<tr>";
												echo "<th>Foto</th>";
												echo "<th>Nome</th>";
												echo "<th>Sobrenome</th>";
												echo "<th>Numero</th>";												
												echo "<th>Votos</th>";
											echo "</tr>";
										echo "</thead>";
										echo "<tbody>";
										while($row = mysqli_fetch_array($result)){
											echo "<tr>";      
												echo "<td><img src='data:image/jpeg;base64,".base64_encode( $row['image'] )."' height='100' width='100'/></td>";
												echo "<td>" . $row['nome'] . "</td>";
												echo "<td>" . $row['sobrenome'] . "</td>";
												echo "<td>" . $row['numero'] . "</td>";												
												echo "<td>" . $row['quant_voto'] . "</td>";
											echo "</tr>";
										}
										echo "</tbody>";                            
									echo "</table>";							
									mysqli_free_result($result);
								} else{
									echo "<p class='lead'><em>Não há votações em curso.</em></p>";
								}
							} else{
								echo "ERRO: Não foi possível executar a query: <br> $query. " . mysqli_error($conn);
							}					
							?>
						</div>
					</div>
				</div>
			</div>
			</body>				
			<?php 
			}
			else{
				echo "<br><br><br><br><br><h3 class='header center orange-text'>".$_SESSION['login_name'] . ", não há votações em curso...</h3>
				<br><br>
				<div class='row center'><a href='../logout.php' id='download-button' class='btn-large waves-effect waves-light red'>Sair</a></div>
				<br><br>";
			}
		}
		else{
			header("location:../dashboard.php");
		}
	}
		
include '../footer.html';?>
</html>