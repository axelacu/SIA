<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-09
 * Time: 18:10
 */


if (isset($_GET['label']) && isset($_GET['type_offre']) && isset($_GET['file_name']) && isset($_GET['description']) && isset($_GET['prix'])) {


    $attributes = array($_GET['label'], $_GET['type_offre'], $_GET['file_name'], $_GET['description'], $_GET['prix']);

    echo '
        <section class="blanc">
            <link rel="stylesheet" href="style.css" />
               <div class="w3-half">
                    <img class="w3-margin-left w3-margin-top" src="' . $attributes[2] . '" alt="' . $attributes[2] . '" style="width:60%">
               </div>
               <div>
                    <h1>'.$attributes[0].'</h1>
                    
                    <h5>' . $attributes[3] . '</h5>
                    <h5 class="w3-padding-32">' . $attributes[4] . '€' . '</h5> 
                    <a href="#.php">
                        <button type="submit" name="add_basket" class="w3-button w3-black w3-round-large">Add to basket<i class="fa fa-shopping-cart"></i></button>
                    </a>
                  
               </div>
        </section>';

}

else {
    header("Location: ../catalogue.php?");
    exit();
}