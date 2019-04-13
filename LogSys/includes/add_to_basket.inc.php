<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-12
 * Time: 15:39
 */

require 'dbh.inc.php';

//bouton supprimer de mon panier
if ($_GET['type']=='suppr') {

    $id_demand = $_GET['id_demand'];

    $sql ="DELETE from DEMAND WHERE ID_DEMAND='$id_demand'";
    $conn->query($sql);

    mysqli_close($conn);
    header("Location:".$_SERVER["HTTP_REFERER"]."?suppr=".$_GET['id_demand']);
    exit();
}

//bouton ajouter à mon panier
if (isset($_POST['add_basket_submit'])) {
    session_start();

    if (empty($_SESSION["USER_ID"]) || empty($_GET['id_offre']) || ($_GET['type_offre']==0 && empty($_POST['qty']))){
        header("Location:".$_SERVER["HTTP_REFERER"]."&error=emptyfields");
        //header("Location: ../catalogue.php?error=emptyfields");
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




    $date_demande = date("Y-m-d");
    $remarque = $_POST['rmq'];
    $id_user = $_SESSION["USER_ID"];
    $id_offre = $_GET['id_offre'];
    $accepted = FALSE;
    $quantite = $_POST['qty'];
    $location = $_POST['pays'];


    //SQL QUERIES

    //------REQUETE DE RECHERCHE DE ID_PLACE
    $sql = "SELECT ID_PLACE FROM PLACE WHERE PLACE_NAME ='$location'";
    $res = $conn->query($sql);

    $data = mysqli_fetch_array($res);
    $id_place = $data[0];

    // POUR L'INSTANT, si le pays n'existe pas dans la table PLACE, alors on donne l'id de France par défaut
    if ($data[0]==null) {
        $id_place = 1;
    }




    //------INSERTION dans la table DEMANDE
    $sql = "INSERT INTO DEMAND (DATE_DEMANDE, REMARQUE, ID_USER, ID_OFFRE, DATE_START, DATE_END, ACCEPTED, QUANTITE_DEMAND, ID_PLACE) VALUES (?,?,?,?,?,?,?,?,?)";


    if(!$query = $conn->prepare($sql)) {
        header("Location:".$_SERVER["HTTP_REFERER"]."&error=sqlerror");
        //header("Location: ../catalogue.php?error=sqlerror");
        exit();

    }
    else {
        $query->bind_param('ssiissiii', $date_demande, $remarque, $id_user, $id_offre, $date_start, $date_end, $accepted, $quantite, $id_place); // s = string, i = integer
        $query->execute();

        header("Location:".$_SERVER["HTTP_REFERER"]."&add_to_basket=success");
        //header("Location: ../catalogue.php?add_to_basket=success");
        exit();

    }

    //closing the STATEMENT !!!!!
    mysqli_close($conn);

}else{
    header("Location: ../catalogue.php?");
    exit();
}