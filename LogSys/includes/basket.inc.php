<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-07
 * Time: 14:46
 */

require "dbh.inc.php";
//on récupere les enregistrements qui n'on pas encore été validé
$req= "SELECT ID_USERBASKET FROM USERBASKET WHERE ID_USER=".$_SESSION['USER_ID']." AND ACCEPTED=0";
$result = mysqli_query($conn,$req);
echo '<meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">';

$array_demands=array();

while($donnees = mysqli_fetch_assoc($result)){
    echo $donnees['ID_USERBASKET'];
    echo $donnees['ID_USER'];
    echo $donnees['DATE_BASKET'];

}


mysqli_free_result($resultat);
