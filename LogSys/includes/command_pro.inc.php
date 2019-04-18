<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 17/04/2019
 * Time: 19:57
 */

require 'dbh.inc.php';

$dir = 'images_catalogue';

$req ='SELECT U.USER_NAME, C.ID_COMMAND,D.ID_DEMAND,O.ID_OFFRE, O.FILE_NAME, O.LABEL, C.DATE_COMMAND,C.DATE_VALIDATION,C.DATE_START,C.DATE_END,O.PRIX, C.VALIDATE_COMMAND, C.PAYMENT,D.QUANTITE_DEMAND, U.USER_NAME, D.ID_USER 
FROM COMMAND C, DEMAND D, OFFRE O, USERS U
WHERE C.ID_DEMAND = D.ID_DEMAND AND D.ID_OFFRE = O.ID_OFFRE AND U.ID_USER = D.ID_USER AND C.PAYMENT= 0 AND C.VALIDATE_COMMAND = 0
ORDER BY U.USER_NAME';


$result = mysqli_query($conn, $req);

$new_client = false;
$condition = false;
$old_client = "";

$IDS = '';
$old = "";

if($result) {
    while ($donnees = mysqli_fetch_row($result)) {



        $client = $donnees[0];
        $file_name = $dir."/".$donnees[4];
        $label = $donnees[5];
        $prix = $donnees[11];
        $IDS = ($old_client === $client? $old = $IDS.','.$donnees[1] : ",".$donnees[1]);
        if(!($old_client === $client)){

            $old_client = $client;
            if($condition){
                echo '
                    </table>
                     <form action="includes/validate_commande.inc.php" method="get">
                          <input type="hidden" name="IDS" value="'.$old.'">
                          <div style="width: 20%;float: right ">
                          <button name="submit-command" class="button" style="color: white; float: left; background: black;">Valider</button>
                          </div>
                     </form>
                       ';
            }



            echo '
            <br>
            <h3> Name of the client : <b>'.$client.'</b></h3>
                    <table class="w3-table w3-bordered">
                        <tr>
                            <th><label> <b>Reference</b></label></th>
                            <th style="width: 30%"><label> <b>Description</b></label></th>
                            <th style="width: 20%"><label> <b>Date commande</b></label></th>
                            <th style="text-align: center"><label> <b>Debut</b></label></th>
                            <th style="text-align: center"><label> <b>Fin</b></label></th>
                            <th style="text-align: center"><label> <b>Valide</b></label></th>
                        </tr>
                        <tr>
                            <td style="width: 100px"><a>r60'.$donnees[1].'</a></td>
                            <td style="width: 10%"><img src="' . $file_name. '" style="width:40%;text-align: center " alt = "'.$label.'"><a style="display: block;padding-left: 10%">'.$label.'</a></td>
                            <td style="text-align: left">' . $donnees[6] . '</td>
                            <td style="text-align: center">' . $donnees[8] . '</td>
                            <td style="text-align: center">' . $donnees[9] . '</td>
                            <td style="text-align: center">' . $donnees[11] . '</td>
                        </tr>';
            if(!$new_client){
                $new_client = true;
                $condition = true;
            }

        }else{
            echo '
                  <tr>
                                <td style="width: 100px"><a>r60'.$donnees[1].'</a></td>
                                <td style="width: 10%" ><img src="' . $file_name. '" style="width:40%;" alt = "'.$label.'"><a style="display: block">'.$label.'</a></td>
                                <td style="text-align: center">' . $donnees[6] . '</td>
                                <td style="text-align: center">' . $donnees[8] . '</td>
                                <td style="text-align: center">' . $donnees[9] . '</td>
                                <td style="text-align: center">' . $donnees[10] . '</td>
                   </tr>';
        }
    }
    if($new_client && $condition) {
        echo ' </table>
             <form action="includes/validate_commande.inc.php" method="get">
                  <input type="hidden" name="IDS" value="'.$IDS.'">
                  <div style="width: 20%;float: right ">
                    <button name="submit-command" class="button" style="color: white; float: left; background: black;">Valider</button>
                  </div>
             </form>';
    }

}
