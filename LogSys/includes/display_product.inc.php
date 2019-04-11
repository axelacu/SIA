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

        <style>
            * {box-sizing: border-box}
            /* Full-width input fields */
            input[type=number] {
                width: 9%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
                
            }
            
            /* Add a background color when the inputs get focus */
            input[type=number]:focus {
                background-color: #ddd;
                outline: none;
            }
        </style>
    
        <section class="blanc">
            <link rel="stylesheet" href="style.css" />
            
               <div class="w3-half">
                    <img class="w3-margin-left w3-margin-top" src="' . $attributes[2] . '" alt="' . $attributes[2] . '" style="width:70%">
               </div>
               
               <div>
                    <h1>'.  $attributes[0] .'</h1>
                    <h5>'. $attributes[3] . '</h5>
                    <h5 style="font-weight: bold; font-size: 24px;">' . $attributes[4] . '€' . '</h5>';

                    if ($attributes[1] == 0)
                        echo '<div>
                                <label for="quantity"><b>Quantity</b></label><br/>
                                <input type="number" name="qty" id="quantity" value=0><br/>
                            </div>';
                    echo '
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