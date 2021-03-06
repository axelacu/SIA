<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-07
 * Time: 14:46
 */

require "dbh.inc.php";

//on récupere les enregistrements qui n'ont pas encore été validé
$req= "SELECT D.DATE_DEMANDE, D.REMARQUE, D.DATE_START, D.DATE_END, I.LABEL, I.DESCRIPTION, D.QUANTITE_DEMAND, I.FILE_NAME, I.PRIX, ID_DEMAND, I.ID_OFFRE, I.TYPE_OFFRE FROM DEMAND D, OFFRE I WHERE D.ACCEPTED=FALSE AND D.ID_OFFRE=I.ID_OFFRE AND D.ID_USER=".$_SESSION['USER_ID'];
$result = mysqli_query($conn,$req);


echo ' <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">';

$array_demands=array();
$total=0;

if(isset($_SESSION['USER_ID']) &&  isset($_SESSION['USER_NAME'])){
    if(mysqli_num_rows($result)) {
        echo '
        
    <div id="aimer">   
        <div class="blanc" id="demand" style="margin-bottom: 0px ; width: 1200px ; max-width: 1200px;" >
            <div class="inscription">
                <h1>My demands</h1>
            </div>
           <div class="w3-container">
               <table class="w3-table w3-bordered">
                   <tr>
                        <th><label for="mail-uid"> <b>Article</b></label></th>
                        <th style="width: 50%"><label for="mail-uid"> <b>Description</b></label></th>
                        <th style="text-align: center"><label for="mail-uid"> <b>Start date</b></label></th>
                        <th style="text-align: center"><label for="mail-uid"> <b>End date</b></label></th>
                        <th style="text-align: center"><label for="mail-uid"> <b>Quantity</b></label></th>
                        <th style="text-align: center"><label for="mail-uid"> <b>Price</b></label></th>
                   </tr>
            ';
        while ($donnees = mysqli_fetch_row($result)) {

            echo '
                    <tr>
                        <td style="width: 200px"> <div class="w3-cell" ">';

            if ($donnees[11]==0){
                $dir = "images_catalogue/";
            }
            else
                $dir = "images_services/";


            echo '
                            <img src="'. $dir . $donnees[7] . '" style="width:60%">
                        </td>
                        <td style="width: 600px"> <a style="text-decoration: underline; color: #3a768f;" href="display_product.php?label=' . $donnees[4] .'&type_offre='.$donnees[11].'&file_name='.$donnees[7].'&description='.$donnees[5].'&prix='.$donnees[8].'&id_offre='.$donnees[10].'" 
                            target="_blank"> '.$donnees[4].':</br> </a>
                            '.$donnees[5].'
                            </br> </br></br>
                            <a style="color: #3a768f; float: left; " href="includes/add_to_basket.inc.php?type=suppr&id_demand='.$donnees[9].'">Delete the article</a>
                        </td>
                        <td style="text-align: center">'.$donnees[2].'</td>
                        <td style="text-align: center">'.$donnees[3].'</td>';

            // Affiche la quantité pour un produit mais pas pour un service
            if ($donnees[11]==0){
                echo'
                                <td style="text-align: center; padding-top: 10px;">'. $donnees[6] .'</td>
                                <!--<td style="text-align: center">
                                    <input type="number" name="qty" id="quantity" min="0" value='. $donnees[6] .' style="width: 55px; height: 30px;"><br/>
                                </td>-->
                                ';
            }
            else {
                echo'<td style="text-align: center"></td>';
            }
            echo'
                        <td style="text-align: center">'.$donnees[8]*$donnees[6].'€</td>
                    </tr>
        ';
            $total+=$donnees[8]*$donnees[6];

        }
        $total_TVA=$total-($total*0.20);
        echo '           
        </table>
        </div>
        
            <div class="w3-container"> 
                <form action="includes/addcomand.inc.php" method="post">
                    <button class="button" style="color: white; width:200px; background: black; margin-top: 10px ;">Validate your order</button>
                </form>
            </div>
        </section>
        
        <div id="global" style="margin-left: auto; margin-right: auto ;width: 1200px;" >
        
            <!--YOU COULD ALSO LIKE-->
            <div class ="blanc" id="demand" style="display: inline-block; margin: 20px 20px 0 0; max-width: 60%;" >
                <section class="inscription">
                    <h1 style="width: 100%;">You could also like</h1>
                </section>
                    ';
        $req2= "SELECT label, type_offre, file_name, description, prix, id_offre FROM OFFRE";
        $result2 = mysqli_query($conn,$req2);
        $array_material = array();

        if($result2) {
            $i=0;
            $count=0;
            while ($donnees = mysqli_fetch_row($result2) and $count < 3) {
                if (($i%4) == 1) {
                    echo '
                                        <div class="w3-third">
                                                <div>
                                                    <div class="w3-container w3-white w3-center">
                                                      <div class="w3-display-container w3-margin">
                                                          <img class=" w3-margin-bottom" src="images_catalogue/' . $donnees[2] . '" alt="' . $donnees[1] . '" style="width:40%">
                                                          <div class="w3-display-middle w3-display-hover">
                                                              <a href="display_product.php?label=' . $donnees[0] . '&type_offre=' . $donnees[1] . '&file_name=images_catalogue/' . $donnees[2] . '&description=' . $donnees[3] . '&prix=' . $donnees[4] . '&id_offre=' . $donnees[5] . '" 
                                                                    target="_blank">
                                                                    
                                                                    <button type="submit" name="display_product" class="w3-button w3-black">View <i class="fa fa-shopping-cart"></i></button>
                                                                    
                                                              </a>
                                                          </div>
                                                          <h5><b>' . $donnees[0] . '</b></h5>
                                                      </div>
                                                    </div>
                                                </div>
                                        </div>
                                    ';
                    $count += 1;
                }

                $i += 1;
            }
        }

        echo '
        
            </div>
            
            <!--TOTAL-->
            <div class ="blanc" id="demand" style="display: inline-block; margin-top:20px; float: right ; flex: auto;"  >
                <section class="inscription" style="display: block">
                    <h1>TOTAL </h1>
                </section>
                <div style="display: inline-block;width:100%">
                    <h3 style="float: right; ">'.$total.',00€</h3>
                </div>
                <div style="display: inline-block;width: 100%; font-size:unset ">        
                    <a style="float:left 100%;">-TVA (20%)</a>
                    <a style="float: right">('.$total*0.20.',00€)</a>
                </div>
                <div style="background:#3a768f ; color: white;padding: 10px; margin: 5px 0 5px 0  "> 
                    <div style="text-align: center">'.$total_TVA.',00€**</div>
                </div>
            </div>
        </div>
        ';
    }else{
        echo '
        <section class="blanc" id="demand">
            <div class="inscription">
                <h1>My demands</h1>
            </div>
            <p>You do not have any demand.</p>
        ';
    }
    echo '</div> ';
}


mysqli_free_result($result);

