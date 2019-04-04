<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "loginsystemtest"; //nom de la base de donnée donnée en PHPMYADMI? 

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
	//renvoie d'erreur en cas de non connexion.
	die("CONNEXION ECHOUE : ".mysqli_connect_error());
}
