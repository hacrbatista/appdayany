<?php
session_start();

require 'config.php';

if(isset($_POST['email']) && empty($_POST['email']) == false) {
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(':email', $email);
	$sql->bindValue(':senha', $senha);
	$sql->execute();

	if($sql->rowCount() > 0) {
		$dado = $sql->fetch();
		$_SESSION['id'] = $dado['id'];

		header("Location: index.php");
	} else {
		?>
		<script type="text/javascript">
			alert("Usuário e/ou senha inválido!");
		</script>
		<?php
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
	<title>App Dayany</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="area-total">
				<div class="area-especializacao">
					<h2>Faça o seu Login:</h2>
					<form method="POST">
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Email:" required>
						</div>
						<div class="form-group">
							<input type="password" name="senha" class="form-control" placeholder="Senha:" required>
						</div>
						<input type="submit" value="Entrar" class="btn btn-success">
					</form><br>
					<p>Ou <a class="link" href="cadastrar.php"> clique aqui</a> e faça o seu cadastro!</p>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>