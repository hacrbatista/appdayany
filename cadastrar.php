<?php
session_start();

require 'config.php';

$msg = false;
if(empty($_POST['email']) == false) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
	$sql->bindValue(":email", $email);
	$sql->execute();

	if($sql->rowCount() == 0) {

		$sql = "INSERT INTO usuarios SET email = :email, senha = :senha, nome = :nome";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', $senha);
		$sql->bindValue(':nome', $nome);
		$sql->execute();

		header("Location: login.php");
	} else {
		$msg = 'existe';
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
				<h2>Faça o seu cadastro:</h2><br>
				<?php if($msg === 'existe'){ ?>
				<div class="alert alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Login <strong><?php echo $email;?></strong> já cadastrado, usar outro!
				</div>
				<?php }?>
				<form method="POST">
					<div class="form-group">
						<input type="text" class="form-control" name="nome" placeholder="Nome:" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="E-mail:" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="senha" placeholder="Senha:" required>
					</div>
					<input type="submit" name="enviar" value="Cadastrar" class="btn btn-success botao-cadastrar">
					<a href="login.php" class="btn btn-danger botao-cancelar">Cancelar</a>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>