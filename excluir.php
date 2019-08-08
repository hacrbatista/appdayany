<?php
session_start();

require 'config.php';

if(empty($_GET['id']) == false) {
	$id = addslashes($_GET['id']);
} else {
	header("Location: index.php");
	exit;
}

$sql = "DELETE FROM porcentagem WHERE id = $id";
$sql = $pdo->prepare($sql);
$sql->bindValue(':id', $id);
$sql->execute();

header("Location: index.php");
exit;

?>