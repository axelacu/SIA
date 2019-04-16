<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-16
 * Time: 16:18
 */

require 'dbh.inc.php';

//On récupère les produits de la base de données
$dir = 'images_catalogue';


$req = "SELECT DISTINCT OFFRE.id_offre, OFFRE.file_name, OFFRE.label, OFFRE.quantite, OFFRE.type_offre FROM OFFRE WHERE type_offre=0";

$result = mysqli_query($conn,$req);

if($result) {
    while ($donnees = mysqli_fetch_row($result)) {
        echo '
                <tr>
                    <td>'. $donnees[0] .'</td>
                    <td style="width: 20%"> <div class="w3-cell">
                        <img src="./images_catalogue/' . $donnees[1] . '" style="width:40%">
                    </td>
                    <td style="text-align: center">' . $donnees[2] . '</td>
                    <td style="text-align: center">' . $donnees[3] . '</td>
                    <td style="text-align: right; margin: 10px 10px; display: flex">
                        <input style="flex: 1; padding: 20px; " type="number" min="-200" max="200" step="5" name="qty" id="quantity" value=0><br/>
                        <form action=<?php update(); ?>>
                            <button style="flex: 2" class="button" style="color: white; background: black ">Update stock</button>
                        </form>
                    </td>
                </tr>
        ';
    }
}

function update(){

}