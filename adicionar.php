<?php
session_start();

require 'config.php';

if(empty($_POST['valor']) == false) {
	$nome = addslashes($_POST['nome']);
	$valor = addslashes($_POST['valor']);

	$sql = "INSERT INTO porcentagem SET nome = :nome, valor = :valor, id_usuario = :id_usuario";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(':nome', $nome);
	$sql->bindValue(':valor', $valor);
	$sql->bindValue(':id_usuario', $_SESSION['id']);
	$sql->execute();

	header("Location: index.php");

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
				<h2>Adicione uma nova especialização:</h2><br>
				<form method="POST">
					<div class="form-group">
						<input type="text" class="form-control" name="nome" placeholder="Nome da especialização:">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="valor" placeholder="Porcentagem:">
					</div>
					<input type="submit" name="enviar" value="Adicionar especialização" class="btn btn-success botao-adicionar">
					<a href="index.php" class="btn btn-danger botao-cancelar">Cancelar</a>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>