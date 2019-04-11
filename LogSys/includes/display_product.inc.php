<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-09
 * Time: 18:10
 */

//include 'header.php';


if (isset($_GET['label']) && isset($_GET['type_offre']) && isset($_GET['file_name']) && isset($_GET['description']) && isset($_GET['prix'])) {


    $attributes = array($_GET['label'], $_GET['type_offre'], $_GET['file_name'], $_GET['description'], $_GET['prix']);

    //header("Location: /SIA/LogSys/display_product?login=success");

    echo '
        <section class="blanc">
            <link rel="stylesheet" href="style.css" />
               <div>
                    <h1>'.$attributes[0].'</h1>
                    
                    <a href="#.php">
                        <button type="submit" name="add_basket" class="w3-button w3-black">Add to basket<i class="fa fa-shopping-cart"></i></button>
                    </a>
                  
               </div>
               
            </section>';

}

else {
    header("Location: ../catalogue.php?");
    exit();
}