<?php
session_start();
include './db.php';

if (@!$_SESSION["login_user"]) {
    echo " <h2>Forbidden 403</h2></br>
    <a>You don't have permission to access / on this server.<a>";
    header("refresh:3 ; index.php");
    
} else if ($_SESSION["login_admin"] == true) {
?>
   <!DOCTYPE html>
    <html>
    <head>         
		<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>    
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
    include 'header.php';
	?>
		<div class="nav-content container">
		  <ul class="tabs tabs-transparent">
			<li class="tab"><a class="active" href="#votacao">Votação</a></li>
			<li class="tab"><a href="#usuarios">Usuários</a></li>
			<li class="tab"><a href="#candidatos">Candidatos</a></li>
		  </ul>
		</div>
	</nav>

	  <ul class="sidenav" id="mobile-demo">
		<li class="tab"><a href="#votacao">Votação</a></li>
		<li class="tab"><a href="#usuarios">Usuários</a></li>
		<li class="tab"><a href="#candidatos">Candidatos</a></li>
	  </ul>

			<div id="usuarios" class="col s12">			
				<div class="wrapper">					
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="page-header clearfix">
									<p align="center" style="color:blue;">
									<?php echo @$_GET['sucesso']; ?>
									</p>
									<p align="center" style="color:red;">
									<?php echo @$_GET['erro']; ?>
									</p>
									<h4 class="pull-left">Usuários</h4>
								</div>
								<?php 
								$query = "SELECT
									id,
									email,
									nome, 
									sobrenome, 
									admin,
									ativo
									FROM usuarios
									WHERE ativo='1'
									ORDER BY id";
								if ($result = mysqli_query($conn, $query)) {
									if (mysqli_num_rows($result) > 0) {
										echo "<table class='table table-bordered table-striped'>";
										echo "<thead>";
										echo "<tr>";
										echo "<th>Nome</th>";
										echo "<th>Sobrenome</th>";
										echo "<th>E-mail</th>";
										echo "<th>Acesso</th>";
										echo "<th></th>";
										echo "</tr>";
										echo "</thead>";
										echo "<tbody>";
										while ($row = mysqli_fetch_array($result)) {
											echo "<tr>";
											echo "<td>" . $row['nome'] . "</td>";
											echo "<td>" . $row['sobrenome'] . "</td>";
											echo "<td>" . $row['email'] . "</td>";
											if ($row['admin'] == 1) {
												echo "<td><span>Administrador  </span><a class='secondary-content'><i class='material-icons'>supervisor_account</i></a></td>";
											} else {
												echo "<td><span>Eleitor  </span><a class='secondary-content'><i class='material-icons'>person</i></a></td>";
											}
											echo "<td>";
											echo "<a href='usuarios/edit.php?id=" . $row['id'] . "' title='Atualizar usuário' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
											echo "<a href='usuarios/delete.php?id=" . $row['id'] . "' title='Apagar usuário' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
											echo "</td>";
											echo "</tr>";
										}
										echo "</tbody>";
										echo "</table>";
										// Free result set
										mysqli_free_result($result);
									} else {
										echo "<p class='lead'><em>Nenhum registro encontrado.</em></p>";
									}
								} else {
									echo "ERRO: Não foi possível executar a query: <br> $query. " . mysqli_error($conn);
								}
								echo "<a class='btn-floating btn-large waves-effect waves-light red right' href='usuarios/new.php'><i class='material-icons'>person_add</i></a>";
								?>
						   </div>
						</div>
					</div>
				</div>
			</div>

			<div id="candidatos" class="col s12">
				<div class="wrapper">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="page-header clearfix">
									<p align="center" style="color:blue;">
									<?php echo @$_GET['sucesso']; ?>
									</p>
									<p align="center" style="color:red;">
									<?php echo @$_GET['erro']; ?>
									</p>
									<h4 class="pull-left">Candidatos</h4>
								</div>
								<?php 
									$query = "SELECT
									id,
									nome, 
									sobrenome, 
									numero,
									ativo,
									image
									FROM candidatos
									WHERE ativo='1'
									ORDER BY id";
									if ($result = mysqli_query($conn, $query)) {
										if (mysqli_num_rows($result) > 0) {
											echo "<table class='table table-bordered table-striped'>";
											echo "<thead>";
											echo "<tr>";
											echo "<th>Foto</th>";
											echo "<th>Nome</th>";
											echo "<th>Sobrenome</th>";
											echo "<th>Numero</th>";
											echo "<th></th>";
											echo "</tr>";
											echo "</thead>";
											echo "<tbody>";
											while ($row = mysqli_fetch_array($result)) {
												echo "<tr>";
												echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' height='100' width='100'/></td>";
												echo "<td>" . $row['nome'] . "</td>";
												echo "<td>" . $row['sobrenome'] . "</td>";
												echo "<td>" . $row['numero'] . "</td>";
												echo "<td>";
												echo "<a href='candidatos/edit.php?id=" . $row['id'] . "' title='Atualizar usuário' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
												echo "<a href='candidatos/delete.php?id=" . $row['id'] . "' title='Apagar usuário' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
												echo "</td>";
												echo "</tr>";
											}
											echo "</tbody>";
											echo "</table>";
											mysqli_free_result($result);
										} else {
											echo "<p class='lead'><em>Nenhum registro encontrado.</em></p>";
										}
									} else {
										echo "ERRO: Não foi possível executar a query: <br> $query. " . mysqli_error($conn);
									}
									echo "<a class='btn-floating btn-large waves-effect waves-light red right' href='candidatos/new.php'><i class='material-icons'>person_add</i></a>";
								?>
						   </div>
						</div>
					</div>
				</div>
			</div>

			<div id="votacao" class="col s12">
			
					<?php
    
						$query = "SELECT
										status
										FROM votacao
										WHERE id = '1'";
						if ($result = mysqli_query($conn, $query)) {
							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_array($result)) {
									$status = $row['status'];
								}
					?>
										<div class="wrapper">
											<div class="container-fluid">
												<?php
												if ($status != 0) {
												?>
													<div class="row">
														<div class="col-md-12">
															<div class="page-header clearfix">
															<p align="center" style="color:blue;">
															<?php echo @$_GET['sucesso']; ?>
															</p>
															<p align="center" style="color:red;">
															<?php echo @$_GET['erro']; ?>
															</p>
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
																if ($result = mysqli_query($conn, $query)) {
																	if (mysqli_num_rows($result) > 0) {
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
																		while ($row = mysqli_fetch_array($result)) {
																			echo "<tr>";
																			echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' height='100' width='100'/></td>";
																			echo "<td>" . $row['nome'] . "</td>";
																			echo "<td>" . $row['sobrenome'] . "</td>";
																			echo "<td>" . $row['numero'] . "</td>";
																			echo "<td>" . $row['quant_voto'] . "</td>";
																			echo "</tr>";
																		}
																		echo "</tbody>";
																		echo "</table>";
																		mysqli_free_result($result);
																	} else {
																		echo "<p class='lead'><em>Não há candidatos cadastrados.</em></p>";
																	}
																} else {
																	echo "ERRO: Não foi possível executar a query: <br> $query. " . mysqli_error($conn);
																		}
															?>
														</div>
														<?php
															echo "<br><h5 class='header center gray-text'>" . $_SESSION['login_name'] . ", encerre a votação clicando abaixo...</h5>
															<br><br>
															<div class='row center'><a href='votacao/change_status.php?id=0' id='download-button' class='btn-large waves-effect waves-light red'>Encerrar votação</a></div>
															<br><br>";
														?>
													</div>
														
													<?php
													} else {
													?>
														<div class="row">
																<div class="col-md-12">
																	<div class="page-header clearfix">
																	<p align="center" style="color:blue;">
																	<?php echo @$_GET['sucesso']; ?>
																	</p>
																	<p align="center" style="color:red;">
																	<?php echo @$_GET['erro']; ?>
																	</p>
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
																		if ($result = mysqli_query($conn, $query)) {
																			if (mysqli_num_rows($result) > 0) {
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
																				while ($row = mysqli_fetch_array($result)) {
																					echo "<tr>";
																					echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' height='100' width='100'/></td>";
																					echo "<td>" . $row['nome'] . "</td>";
																					echo "<td>" . $row['sobrenome'] . "</td>";
																					echo "<td>" . $row['numero'] . "</td>";
																					echo "<td>" . $row['quant_voto'] . "</td>";
																					echo "</tr>";
																				}
																				echo "</tbody>";
																				echo "</table>";
																				mysqli_free_result($result);
																			} else {
																				echo "<p class='lead'><em>Não há votações em curso.</em></p>";
																					}
																		} else {
																			echo "ERRO: Não foi possível executar a query: <br> $query. " . mysqli_error($conn);
																				}
																	?>
																</div>
														</div>
													<?php
															echo "<br><h5 class='header center gray-text'>" . $_SESSION['login_name'] . ", não há votações em curso...</h5>
															<br><br>
															<div class='row center'><a href='votacao/change_status.php?id=1' id='download-button' class='btn-large waves-effect waves-light green'>Iniciar Votação</a></div>
															<br><br>";
															}
													?>
												</div>
										</div>
									</body>	<?php
							} else {
								header("location:../dashboard.php");
								}
						}
						echo "</div>";
    
    
} else {
    include 'header.php';
    $id = $_SESSION['login_user'];
    
    $query = "SELECT
				usuarios.votou,
				votacao.status
				FROM usuarios
				INNER JOIN votacao
				WHERE usuarios.id = '$id'
				ORDER BY usuarios.id";
    if ($result = mysqli_query($conn, $query)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row['votou'] == false && $row['status'] == true) {
											?>
		    </nav>
			<div class="section no-pad-bot" id="index-banner">
				<div class="container">
					<br>
					<br>
					<h1 class="header center orange-text">Votar</h1>
					<div class="row center">
						<h5 class="header col s12 light"><i>Participar da escolha de um representante da sua comunidade, cidade, estado ou país é ajudar a escrever a história da sociedade em que vivemos.</i></h5>
					</div>
					<div class="row center">
						<a href="votacao/votar.php" id="download-button" class="btn-large waves-effect waves-light orange">Votar</a>
					</div>
					<br>
					<br>

				</div>
			</div>
						<?php
                } else {
						?>
						</nav>
						<div class="section no-pad-bot" id="index-banner">
							<div class="container">
								<br>
								<br>
								<h1 class="header center orange-text">
								<?php echo $_SESSION['login_name'] . ', obrigado pelo voto!';?></h1>
								<div class="row center">
									<h5 class="header col s12 light"><i>Participar da escolha de um representante da sua comunidade, cidade, estado ou país é ajudar a escrever a história da sociedade em que vivemos.</i></h5>
								</div>
								<div class="row center">
									<a href="votacao/acompanhar.php" id="download-button" class="btn-large waves-effect waves-light orange">Acompanhar Eleição</a>
								</div>
								<br>
								<br>

							</div>
						</div>
						<?php
                }
                
            }
        }
    }
}
include 'footer.php';
mysqli_close($conn);
?>