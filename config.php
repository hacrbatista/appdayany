<?php
try {
	$pdo = new PDO("mysql:dbname=app_dayany;host=localhost", "root", "");
	//$pdo = new PDO("mysql:dbname=id8604998_app_dayany;host=localhost", "id8604998_dayany", "q8QpTwtxd3&UB!VPowM5");
} catch (PDOException $e) {
	die($e->getMessage());
}

?>