<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-12
 * Time: 17:19
 */

session_start();

require 'dbh.inc.php';
$reqTwo="SELECT D.ID_DEMAND, D.REMARQUE, D.DATE_START, D.DATE_END, I.LABEL, I.DESCRIPTION, D.QUANTITE_DEMAND, I.FILE_NAME, I.PRIX FROM DEMAND D, OFFRE I WHERE D.ACCEPTED=FALSE AND D.ID_OFFRE=I.ID_OFFRE AND D.ID_USER=".$_SESSION['USER_ID'];
$reqOne="UPDATE DEMAND SET ACCEPTED=TRUE WHERE ID_USER=".$_SESSION['USER_ID'];



$resultTwo = mysqli_query($conn,$reqTwo);
if(!$resultTwo){
    header("Location:".$_SERVER["HTTP_REFERER"]."&error=sqlerror");
    //header("Location: ../catalogue.php?error=sqlerror");
    exit();
}

$resultOne = mysqli_query($conn,$reqOne);


if(!$resultOne){
    header("Location:".$_SERVER["HTTP_REFERER"]."&error=sqlerror");
    //header("Location: ../catalogue.php?error=sqlerror");
    exit();
}


while ($donnees = mysqli_fetch_row($resultTwo)) {
    $reqThree=null;
    $reqThree="INSERT INTO COMMAND(ID_DEMAND, DATE_COMMAND, DATE_START,DATE_END,PAYMENT,VALIDATE_COMMAND,DATE_VALIDATION) VALUES(".$donnees[0].",'".date("Y-m-d")."','".$donnees[2]."','".$donnees[3]."',0,0);";
    $resultThree = mysqli_query($conn,$reqThree);
    if(!$resultThree){
        header("Location:".$_SERVER["HTTP_REFERER"]."&error=sqlerror");
        //header("Location: ../catalogue.php?error=sqlerror");
        exit();
    }
}


header("Location: ../commands_client.php?");
