<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-12
 * Time: 15:39
 */


if (isset($_POST['add_basket_submit'])) {
    session_start();

    if (empty($_SESSION["USER_ID"]) || empty($_GET['id_offre']) || empty($_POST['qty'])){
        print_r($_SESSION["USER_ID"].' '.$_GET['id_offre'].' '.$_POST['qty']);
        //header("Location:".$_SERVER["HTTP_REFERER"]."&error=emptyfields");
        header("Location: ../catalogue.php?error=empty");
        exit();
    }

    if (empty($_POST['trip-start']))
        $date_start = date("Y-m-d");
    else
        $date_start = $_POST['trip-start'];


    if (empty($_POST['trip-end']))
        $date_end = date("Y-m-d");
    else
        $date_end = $_POST['trip-end'];

    require 'dbh.inc.php';


    $date_demande = date("Y-m-d");
    $remarque = $_POST['rmq'];
    $id_user = $_SESSION["USER_ID"];
    $id_offre = $_GET['id_offre'];
    $accepted = FALSE;
    $quantite = $_POST['qty'];
    $location = $_POST['pays'];

    //REQUETE DE RECHERCHE DE ID_PLACE
    $sql0 = "SELECT ID_PLACE FROM PLACE WHERE PLACE_NAME ='.$location.'";
    $stmt0 = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt0, $sql0)) {
        //header("Location:".$_SERVER["HTTP_REFERER"]."&error=sqlerror1");
        header("Location: ../catalogue.php?error=sql0");
        exit();
    }
    else {
        $result = mysqli_query($conn,$sql0);
        $row = mysqli_fetch_row($result);
        $id_place = $row[0];
    }

    /*if ($id_place==null) {
        $id_place = 1;
    }*/



    //INSERTION DE LA DEMANDE
    $sql = "INSERT INTO DEMAND (DATE_DEMANDE, REMARQUE, ID_USER, ID_OFFRE, DATE_START, DATE_END, ACCEPTED, QUANTITE_DEMAND, ID_PLACE) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        //header("Location:".$_SERVER["HTTP_REFERER"]."&error=sqlerror1");
        header("Location: ../catalogue.php?error=sql");
        exit();

    }
    else {
        mysqli_stmt_bind_param($stmt, "ssiissiii", $date_demande, $remarque, $id_user, $id_offre, $date_start, $date_end, $accepted, $quantite, $id_place);
        mysqli_stmt_execute($stmt);

        //header("Location:".$_SERVER["HTTP_REFERER"]."&error=sqlerror1");
        //header("Location: ../catalogue.php?add=success");
        print_r($date_start);
        exit();
    }

    //closing the STATEMENT !!!!!
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}else{
    header("Location: ../signup.php?");
    exit();
}