<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-17
 * Time: 19:27
 */

require "dbh.inc.php";

$req = "SELECT D.QUANTITE_DEMAND, I.LABEL,I.PRIX,C.DATE_START, C.DATE_END,C.DATE_VALIDATION, E.EMPLOYEE_NAME, E.EMPLOYEE_LAST_NAME  FROM DEVIS Dev, COMMAND C,DEMAND D,EMPLOYEE E, OFFRE I  WHERE I.ID_OFFRE = D.ID_OFFRE AND  Dev.ID_DEVIS = C.ID_DEVIS AND D.ID_DEMAND = C.ID_DEMAND AND DEV.ID_EMPLOYEE = E.ID_EMPLOYEE AND D.ID_USER = " .$_GET['USER_ID']." AND C.ID_COMMAND=" . $_GET["ID_COMMAND"].';';
$result = mysqli_query($conn,$req);
echo $req;


$ecrire=fopen('devis.txt','w');
$data="";
$retourChariot = "\n";
while ($donnees = mysqli_fetch_row($result)) {
    $data = $donnees[0]. ';' . $donnees[1]. ';' .$donnees[2]. ';' .$donnees[3]. ';' .$donnees[4]. ';' .$donnees[5]. ';' .$donnees[6]. ';' .$donnees[7] ;
    $ecrire=fopen('devis.txt','a+');
    fputs($ecrire,$data);
    fputs($ecrire, $retourChariot);
}


fputs($ecrire,$data);