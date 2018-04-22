<?php

include '../db.php';
session_start();


if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Get hidden input value
    $id = $_GET["id"];
    
    $query = "SELECT
			id,
			email,
			nome, 
			sobrenome, 
			admin,
			ativo
			FROM usuarios
			WHERE id = '$id'";
    if ($result = mysqli_query($conn, $query)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $nome      = $row['nome'];
                $sobrenome = $row['sobrenome'];
                $email     = $row['email'];
                $admin     = $row['admin'];
            }
        } else {
            header("location:../dashboard.php?erro=Erro ao tentar alterar este usuário.");
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
            <div class="container">
			<h4 class="text" align="left" style="color:indigo;">Alterar usuário</h4><br>
                <form class="col s12" action="update.php" method="post">				
                    <div class="row">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="input-field col s6">
                            <input id="first_name" name="first_name" type="text" value="<?php echo $nome; ?>" class="validate">
                            <label for="first_name">Nome</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" name="last_name" type="text" value="<?php echo $sobrenome; ?>" class="validate">
                            <label for="last_name">Sobrenome</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" value="<?php echo $email; ?>" class="validate">
                            <label for="email">E-mail</label>
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
								<input type="checkbox" id="admin" name="admin" value="yes" <?php echo $admin == 1 ? 'checked' : ''; ?>>
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

<?php
include '../footer.html';
?>
</html>