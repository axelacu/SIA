<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-16
 * Time: 16:18
 */

require 'dbh.inc.php';

if (isset($_GET['update'])) {

    $qty = $_POST['qty'];
    $id_offre = $_GET['id'];
    $req = "UPDATE OFFRE SET quantite = quantite + '$qty' WHERE id_offre='$id_offre'";

    $result = mysqli_query($conn, $req);

    if ($result) {
        header("Location: ../update_stock.php?update=success");
    }
}