<?php
session_start();

require 'config.php';

if(empty($_FILES['foto']) == false && isset($_FILES['foto'])) {
	$foto = $_FILES['foto'];
	$tipo = $foto['type'];

	if($tipo == 'image/jpeg' || $tipo == 'image/png') {
		$tmpname = md5(time().rand(0,9999)).'.jpg';

		move_uploaded_file($foto['tmp_name'], 'image/'.$tmpname);

		list($width_orig, $height_orig) = getimagesize('image/'.$tmpname);
		$ratio = $width_orig/$height_orig;

		$width = 100;
		$height = 100;
		$width_direcao = 0;
		$height_direcao = 0;
		$width_tela = 100;
		$height_tela = 100;

		if($width/$height > $ratio) {
			$width = $height*$ratio;
			$width_direcao = round(($height-$width)/2);
		} else {
			$height = $width/$ratio;
			$height_direcao = round(($width-$height)/2);
		}

		$img = imagecreatefromjpeg('image/tela.jpg');

		if($tipo == 'image/jpeg') {
			$origi = imagecreatefromjpeg('image/'.$tmpname);
		} elseif ($tipo == 'image/png') {
			$origi = imagecreatefrompng('image/'.$tmpname);
		}

		imagecopyresampled($img, $origi, $width_direcao, $height_direcao, 0, 0, $width, $height, $width_orig, $height_orig);

		imagejpeg($img, 'image/'.$tmpname, 80);

		$sql = "SELECT * FROM fotos WHERE id_usuario = :id_usuario";

		$sql = $pdo->prepare($sql);
		$sql->bindValue(':id_usuario', $_SESSION['id']);
		$sql->execute();

		if($sql->rowCount() > 0) {

			$sql = "UPDATE fotos SET url = :url WHERE id_usuario = :id_usuario";
			$sql = $pdo->prepare($sql);
			$sql->bindValue(':url', $tmpname);
			$sql->bindValue(':id_usuario', $_SESSION['id']);
			$sql->execute();

		} else {

			$sql = "INSERT INTO fotos SET id_usuario = :id_usuario, url = :url";
			$sql = $pdo->prepare($sql);
			$sql->bindValue(':id_usuario', $_SESSION['id']);
			$sql->bindValue(':url', $tmpname);
			$sql->execute();

		}

		header("Location: index.php");
	} 
}