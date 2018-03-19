<?php
$dbServername = "localhost";
$dbUsername = "id5055971_root";
$dbPassword = "admin";
$dbName = "id5055971_filrougestream";
// $dbServername = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "filrougestream";
// Requête de connexion a la base de donnée.
$conn = new PDO("mysql:host={$dbServername};dbname={$dbName}",$dbUsername,$dbPassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn-> exec("set names utf8");

$sql = $conn->prepare("SELECT * FROM articles");
// Execute la requête sql et la stock dans la variable $result.
$sql->execute();
$resultCheck = $sql->rowCount();
$row = $sql->fetchAll(PDO::FETCH_OBJ);
 ?>
