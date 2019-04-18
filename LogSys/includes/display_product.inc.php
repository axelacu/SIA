<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-09
 * Time: 18:10
 */

require 'dbh.inc.php';

// $id_user = $_SESSION['USER_ID'];
?>

<?php

if (isset($_GET['label']) && isset($_GET['type_offre']) && isset($_GET['file_name']) && isset($_GET['description']) && isset($_GET['prix'])) {
    $attributes = array($_GET['label'], $_GET['type_offre'], $_GET['file_name'], $_GET['description'], $_GET['prix'], $_GET['id_offre']);

    $current_date = date("Y-m-d");

    if ($attributes[1] == 0)
        $dir = 'images_catalogue';
    else
        $dir = 'images_services';

    $image = $dir . "/" . $attributes[2];

    echo '
        
        <style>
            * {box-sizing: border-box}
            /* Full-width input fields */
            input[type=number], input[type=date], textarea, select {
                width: 9%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;   
            }
            
         
            
            
            /* Add a background color when the inputs get focus */
            input[type=number]:focus, input[type=date]:focus, textarea:focus {
                background-color: #ddd;
                outline: none;
            }
        </style>
    
        <section class="blanc" id="display_produit">
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
            <form action="includes/add_to_basket.inc.php?id_offre=' . $attributes[5] . '&type_offre=' . $attributes[1]. '" method="post">';

    echo '    
                <div id="bloc1" xmlns="http://www.w3.org/1999/html">
                    <img style="width: 30%;height: 30%;margin: 0 auto;" class="w3-border" src="'. $image . '" alt="' . $image . '" style="width:70%">
                    <h5 style="font-weight: bold;font-size: 1em;text-align: center; margin: 0 auto; width: 100%; padding-top: 10px; padding-bottom: 10px">Prix unitaire : ' . $attributes[4] . '€' . '</h5>
                    
                
                    <div id="nom-description-produit"> 
                        <h1 style="border-bottom: 1px solid #212121; padding-bottom: 10px; font-size: 1.5rem">'. $attributes[0] .'</h1>
                        <h5 style="padding-top: 10px; padding-bottom: 10px">'. $attributes[3] . '</h5>
                        <div id="quantité_prix">';

                         if ($attributes[1] == 0) {

    echo'                   <div id = "quantité" >
                                <label for="quantity" ><b > Quantité:</b ></label ><br />
                                <input type = "number" min = "1" max = "100" name = "qty" id = "quantity" value = 1 >
                            </div >
                         
                            <i style="margin-top: 50px; color: green; padding-left: 1em" class="far fa-check-circle"></i>
                            <a style="margin-top: 46px; color: green; padding-left: 0.5em; margin-right: 40%">En stock</a>';
                        }
    echo'               </div>
                    </div>
                </div>

                <div id="form_info">
                    <label for="start" id="start"><b>Localisation :</b></label>';
                    include('pays.inc.php');
    echo '
                    <label for="start" id="start"><b>Start date:</b></label>
                    <input style="width: 100%" type="date" id="date" name="trip-start" value="'.$current_date.'" min="'.$current_date.'" max="2020-12-31">
        
                    <label for="start" id="start"><b>End date:</b></label>
                    <input style="width: 100%" type="date" type="date" id="date" name="trip-end" value="'.$current_date.'" min="'.$current_date.'" max="2020-12-31">
        
                    <textarea style="width: 100%" name="rmq"  id="remarque" placeholder="Remarque"></textarea>
                </div>
                    <div id="addbasket">
                        <button style="margin-top: 0; margin-bottom: 0" type="submit" name="add_basket_submit" class="w3-button w3-green">Add to basket <i class="fa fa-shopping-cart"></i></button>
                    </div>              
            </form>                       
        </section>';

}

else {
    header("Location: ../catalogue.php");
    exit();
}