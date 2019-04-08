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
$requetes="";

$sql=file(__DIR__. "/sqlQuerys.sql"); // on charge le fichier SQL

if($sql) {

    foreach ($sql as $l) { // on le lit
        $requetes = $requetes . $l;
    }
    $reqs = explode(';', $requetes);// on sépare les requêtes
    foreach ($reqs as $req) {    // et on les éxécute
        echo $req;
        mysqli_query($conn, $req);
    }
}

echo "base restauré";