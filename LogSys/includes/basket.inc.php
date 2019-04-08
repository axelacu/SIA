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
echo '<meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">';

$array_demands=array();

if($stmt=mysqli_prepare($conn,$req)){
        /* Exécution de la requête */
        mysqli_stmt_execute($stmt);
        /* Stockage du résultat */
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt)==0){
            echo'
            <section class="blanc">
            <div id="NotDemand"> Vous n\'avez pas de demandes en cours</div>
            </section>   
                        ';
        } else {
            for($i=0;$i<mysqli_stmt_num_rows($stmt);$i++){
                echo'
                <div id="demand" style="display: inline-block; position: relative; width:100% ">
                    <div class="blanc2right" >
                         Commande
                    </div>
                    <div  class=" blanc2left" ">
                         Total 
                    </span>
                    
                </div>
                
            ';
            }


        }
        /* Fermeture de la commande */
        mysqli_stmt_close($stmt);
}



