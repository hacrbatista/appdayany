<?php
session_start();

require 'config.php';

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
	$id = $_SESSION['id'];
} else {
	header("Location: login.php");
}

$sql = "SELECT * FROM usuarios WHERE id = $id";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0) {
	foreach ($sql->fetchAll() as $usuario) {
		$nome = $usuario['nome'];
		$email = $usuario['email'];
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
	<div class="topo">
		<?php

		$sql = "SELECT * FROM fotos WHERE id_usuario = :id_usuario";

		$sql = $pdo->prepare($sql);
		$sql->bindValue(':id_usuario', $_SESSION['id']);
		$sql->execute();

		if($sql->rowCount() > 0) {
			foreach ($sql->fetchAll() as $foto) {
				?>
				<img src="image/<?php echo $foto['url']; ?>">
				<?php
			}
			
		} else {
			?>
			<img src="image/sem-foto.jpg">
			<?php
		}

		?>
		
		<form method="POST" enctype="multipart/form-data" action="upload-foto.php">
			<div class="form-group">
				<input type="file" name="foto" class="btn">
			</div>
			<div class="form-group">
				<input type="submit" value="Enviar" class="btn btn-success">
			</div>
		</form>

		<h2>Bem-vindo(a), <?php echo $nome; ?></h2>
	</div>
	<div class="container">
		<div class="row">
			<div class="botoes-topo">
				<a href="adicionar.php" class="btn btn-primary">Adicionar Nova Especialização</a>
				<a href="sair.php" class="btn btn-danger botao-sair">Sair</a>
			</div>
			<div class="area-total">
				<?php

				$sql = "SELECT * FROM porcentagem WHERE id_usuario = :id";

				$sql = $pdo->prepare($sql);
				$sql->bindValue(':id', $id);
				$sql->execute();

				if($sql->rowCount() > 0) {
					foreach ($sql->fetchAll() as $opcao) {
						?>
						<div class="area-especializacao">
							<h2><?php echo $opcao['nome']; ?></h2>
							<input type="hidden" id="p<?php echo $opcao['id']; ?>" value="<?php echo $opcao['valor']; ?>">
							<div class="form-group">
								<input type="text" class="form-control" id="v<?php echo $opcao['id']; ?>" name="v<?php echo $opcao['id']; ?>" placeholder="Valor:">
							</div>
							<button id="c<?php echo $opcao['id']; ?>" class="btn btn-success calcular">Calcular</button>
							<a href="alterar.php?id=<?php echo $opcao['id']; ?>" class="btn btn-primary botao-alterar">Alterar Especialização</a>
							<a href="excluir.php?id=<?php echo $opcao['id']; ?>" class="btn btn-danger botao-excluir">Excluir Especialização</a>
							<br><br>
						</div>

						<?php
					}
				} else {
					?>
					<div class="area-especializacao">
						<br>
						<h3>Você ainda não possue nenhuma especialização cadastrada!</h3>
						<a href="adicionar.php" class="btn btn-success">Cadastrar Especialização</a>
						<br><br>
					</div>

					<?php
				}

				?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>