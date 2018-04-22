<!DOCTYPE html>
<html>

<head>

	<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
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
		session_start();
		include '../db.php';
		include '../header.php';
	?>


	</nav>
    <div class="section"></div>
    <main>
        <center> 
            <div class="section"></div>			
            <div class="container" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
			<h5 class="text" align="left" style="color:indigo;">Digite o número do seu candidato:</h5><br>
                <form class="col s12" action="" method="post" >			
                    <div class="row">
                        <div class="input-field col s6">
                            <p><input type="text" class="form-control" id="numero" name="numero"></p>                            
                        </div>
                    </div>                    					
                    <div class='right row'>
						<button type=button class="btn waves-effect waves-light red" onclick="location.href = '../dashboard.php';">Cancelar
							<i class="material-icons right">arrow_back</i>
						</button>
                        <button class="btn waves-effect waves-light indigo" type="submit" id="sub" name="sub">Buscar
							<i class="material-icons right">send</i>
						</button>
                    </div>
                </form>
				<?php
				if(isset($_POST['sub'])){
					$numero = $_POST['numero'];
					
					$query = "select * from candidatos where numero='$numero' and ativo='1' ORDER BY id";
					if($result = mysqli_query($conn, $query)){
						if(mysqli_num_rows($result) > 0){
							echo "<table class='table table-bordered table-striped'>";
								echo "<thead>";
									echo "<tr>";
										echo "<th>Foto</th>";
										echo "<th>Nome</th>";
										echo "<th>Sobrenome</th>";
										echo "<th>Numero</th>";												
										echo "<th>Votar</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";      
										echo "<td><img src='data:image/jpeg;base64,".base64_encode( $row['IMAGE'] )."' height='100' width='100'/></td>";
										echo "<td>" . $row['NOME'] . "</td>";
										echo "<td>" . $row['SOBRENOME'] . "</td>";
										echo "<td>" . $row['NUMERO'] . "</td>";
										echo "<td>";
											echo "<a href='reg_voto.php?id=". $row['ID'] ."' title='Votar' data-toggle='tooltip'><span class='glyphicon glyphicon-ok'></span></a>";											
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";                            
							echo "</table>";							
							mysqli_free_result($result);
						} else{
							echo "<p class='lead'><em>Nenhum candidato encontrado.</em></p>";
						}
					}
				}	
				?>
            </div>
            </div>
        </center>
        <div class="section"></div>
        <div class="section"></div>		
    </main>	
</body>

<?php include '../footer.html';?>

</html>

