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

$sql=file("../sqlQuerys.sql"); // on charge le fichier SQL

echo $sql;
foreach($sql as $l){ // on le lit
    $requetes =$requetes.$l;
}
echo $requetes;

$reqs = str_split(";",$requetes);// on sépare les requêtes

foreach($reqs as $req){	// et on les éxécute
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$req)){
        die("ERROR".$req);
    }

    mysqli_stmt_execute($stmt);

}
echo "base restaurée";
?>

