<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-07
 * Time: 14:46
 */

require "dbh.inc.php";

//on récupere les enregistrements qui n'ont pas encore été validé
$req= "SELECT D.DATE_DEMANDE, D.REMARQUE, D.DATE_START, D.DATE_END, I.LABEL, I.DESCRIPTION, D.QUANTITE_DEMAND, I.FILE_NAME, I.PRIX, ID_DEMAND FROM DEMAND D, OFFRE I WHERE D.ID_OFFRE=I.ID_OFFRE AND D.ID_USER=".$_SESSION['USER_ID'];
$result = mysqli_query($conn,$req);


echo '<meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">';

$array_demands=array();
$total=0;
if(isset($_SESSION['USER_ID']) &&  isset($_SESSION['USER_NAME'])){
    if(mysqli_num_rows($result)) {
        echo '
        <section class="blanc" id="demand" style="margin-bottom: 0px ; width: 1200px ; max-width: 1200px;" >
            <div class="inscription">
                <h1>My demands</h1>
            </div>
           <div class="w3-container">
               <table class="w3-table w3-bordered">
                   <tr>
                        <th><label for="mail-uid"> <b>Article</b></label></th>
                        <th style="width: 40%"><label for="mail-uid"> <b>Description</b></label></th>
                        <th style="text-align: center"><label for="mail-uid"> <b>Date de Debut</b></label></th>
                        <th style="text-align: center"><label for="mail-uid"> <b>date de fin</b></label></th>
                        <th style="text-align: center"><label for="mail-uid"> <b>quantite</b></label></th>
                        <th style="text-align: center"><label for="mail-uid"> <b>prix</b></label></th>
                   </tr>
            ';
        while ($donnees = mysqli_fetch_row($result)) {
            echo '
                    <tr>
                        <td style="width: 200px"> <div class="w3-cell" ">
                            <img src="./images_catalogue/' . $donnees[7] . '" style="width:60%">
                        </td>
                        <td style="width: 600px"> <a style="text-decoration: underline; color: #3a768f; "> '.$donnees[4].':</br> </a>
                            '.$donnees[5].'
                            </br> </br></br>
                            <a style="color: #3a768f; float: left; " href="includes/add_to_basket.inc.php?type=suppr&id_demand='.$donnees[9].'">Supprimer cette article</a>
                        </td>
                        <td style="text-align: center">'.$donnees[2].'</td>
                        <td style="text-align: center">'.$donnees[3].'</td>
                        <td style="text-align: center"><input type="number" name="qty" id="quantity" value=0 style="width: 50px"><br/></td>
                        <td style="text-align: center">'.$donnees[8].'€</td>
                    </tr>
        ';
            $total+=$donnees[8]*$donnees[6];

        }
        echo '           
        </table>
        </div>
        <div> <button class="button" style="color: white; width:200px; background: black; margin-top: 10px ;">Valider cette commande</button></div>
        </section>
        <div id="global" style="margin-left: auto; margin-right: auto ;width: 1200px; height: 300px;" >
        <section class ="blanc" id="demand" style="width: 75% ;display: inline-block;margin-top: 20px; float: left ; height: 100%" >
        <div class="inscription">
                <h1 style="width: 100%;">vous pourriez aussi aimez </h1>
            </div>
        </section>
        <section class ="blanc" id="demand" style="width: 23% ;display: inline-block; margin-top:20px; float: right ; height:100%"  >
        <div class="inscription" style="display: block">
                <h1>TOTAL </h1>
        </div>
        <div style="display: block;width:100%">
            <h3 style="float: right; ">'.$total.',00€</h3>
        </div>
        <div style="display: block">        
            <h6 >-TVA (20%)</h6>
        </div>
        </section>
        </div>
        ';
    }else{
        echo '
        <section class="blanc" id="demand">
            <div class="inscription">
                <h1>My demands</h1>
            </div>
            <p>Vous n\'avez pas de demande en cours.</p>
            ';
    }
}


mysqli_free_result($result);
