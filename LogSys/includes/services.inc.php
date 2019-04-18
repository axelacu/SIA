<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-07
 * Time: 17:18
 */

require 'dbh.inc.php';

$req = "SELECT DISTINCT label, file_name, description, prix, id_offre FROM OFFRE WHERE TYPE_OFFRE=1";
$result = mysqli_query($conn,$req);

$dir = 'images_services';


echo '<meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">';


while($row = mysqli_fetch_row($result)) {
    $label = $row[0];
    $file_name = $row[1];
    $description = $row[2];
    $prix = $row[3];
    $id_offre = $row[4];


    $image = $dir . "/" . $file_name;


    echo '<div class="w3-row-padding" style="padding-bottom: 0">
            <div class="w3-two">
                <div class="w3-card" style="margin: 20px";>
                    <div class="w3-container w3-center" style="background-color: #17469F; color:#EEEEEE; margin-bottom: 20px">
                        <h1 class="w3-top-left-align">' . $label . '</h1>
                        <div class="w3-display-container">
                            <img class="w3-margin" src="' . $image . '" alt="' . $image . '" style="width:30%">
                            <div class="w3-display-middle w3-display-hover">
                                <a href="display_product.php?label=' . $label .'&type_offre=1&file_name='. $file_name .'&description='. $description .'&prix='. $prix .'&id_offre='.$id_offre.'" 
                                target="_blank">
                                    <button type="submit" name="display_product" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
                                </a>
                            </div>
                        </div>
                        <h5 style="padding-bottom: 20px;">' . $description . '</h5>
                    </div>
                </div>
            </div>
          </div>';
}

