<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-17
 * Time: 23:10
 */

require 'dbh.inc.php';

if (isset($_GET['register'])) {

    $name_equipe = $_POST['equipe'];
    $id_command = $_GET['id'];


    //vérifier qu'il n'existe pas une intervention déjà programmée pour cette commande
    $sql = "SELECT * FROM INTERVENTION WHERE id_command='$id_command'";
    $result = $conn->query($sql);

    if ($result) {
        $row_cnt = $result->num_rows;
        if ($row_cnt > 0) {
            header("Location: ../register_intervention.php?echec=alreadyinbase");
            $result->close();
            exit();
        }

    }

    //requête qui récupère l'id de l'équipe sélectionné pour l'intervention
    $sql = "SELECT id_equipe FROM EQUIPE WHERE name_equipe='$name_equipe'";
    $result = $conn->query($sql);



    if ($result) {
        echo $_POST['equipe'];
        $data = mysqli_fetch_array($result);
        $id_equipe = $data[0];

        $sql = "INSERT INTO INTERVENTION(ID_EQUIPE, ID_COMMAND) VALUES ('$id_equipe','$id_command')";
        $result = $conn->query($sql);

        if ($result) {
            header("Location: ../register_intervention.php?register=success");
            $result->close();
            exit();
        }
    }
}