<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-17
 * Time: 23:12
 */


$req = "SELECT DISTINCT name_equipe FROM EQUIPE";
$result1 = mysqli_query($conn,$req);

if($result1) {
    while ($donnees = mysqli_fetch_row($result1)) {
        echo $donnees[0];
        echo '
            <option value="' . $donnees[0] . '">' . $donnees[0] . ' </option>';
    }
}

$result1->close();