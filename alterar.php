<?php
session_start();

require 'config.php';

if(empty($_POST['valor']) == false) {
	$nome = addslashes($_POST['nome']);
	$valor = addslashes($_POST['valor']);
	$id = addslashes($_POST['id']);

	$sql = "UPDATE porcentagem SET nome = :nome, valor = :valor WHERE id = :id";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(':nome', $nome);
	$sql->bindValue(':valor', $valor);
	$sql->bindValue(':id', $id);
	$sql->execute();

	header("Location: index.php");

}

if(empty($_GET['id']) == false) {
	$id = addslashes($_GET['id']);
} else {
	header("Location: index.php");
	exit;
}

$sql = "SELECT * FROM porcentagem WHERE id = $id";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0) {
	foreach ($sql->fetchAll() as $opcao) {
		$id = $opcao['id'];
		$nome = $opcao['nome'];
		$valor = $opcao['valor'];
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
				<h2>Alterar Especialização:</h2>
				<form method="POST">
					<input type="hidden" name="id" value="<?php echo $id; ?>"><br>
					<h4>Nome:</h4>
					<div class="form-group">
						<input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>">
					</div>

					<h4>Porcentagem:</h4>
					<div class="form-group">
						<input type="text" class="form-control" name="valor" value="<?php echo $valor; ?>">
					</div>

					<input type="submit" name="enviar" value="Salvar alterações" class="btn btn-success botao-alterar">
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