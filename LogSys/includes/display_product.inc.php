<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-09
 * Time: 18:10
 */

require 'dbh.inc.php';

if (isset($_GET['label']) && isset($_GET['type_offre']) && isset($_GET['file_name']) && isset($_GET['description']) && isset($_GET['prix'])) {
    $attributes = array($_GET['label'], $_GET['type_offre'], $_GET['file_name'], $_GET['description'], $_GET['prix'], $_GET['id_offre']);

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
            
            section {
                width:80%;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            
            input[type=date], #date, textarea, select {
                width: 50%;
                display: block;
                margin-left: auto;
            }
            
            
            /* Add a background color when the inputs get focus */
            input[type=number]:focus, input[type=date]:focus, textarea:focus {
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
                    <h1>'. $attributes[0] .'</h1>
                    <h5>'. $attributes[3] . '</h5>
                    <h5 style="font-weight: bold; font-size: 24px;">' . $attributes[4] . '€' . '</h5>';

                    if ($attributes[1] == 0)
                        echo '<form action="includes/add_to_basket.inc.php?id_offre='.$attributes[5].'" method="post">
                                <label for="quantity"><b>Quantity:</b></label><br/>
                                <input type="number" min="0" max="100" name="qty" id="quantity" value=0><br/>
                                <label for="start" id="date"><b>Location:</b></label>';
                                include('pays.inc.php');
                        echo '
                                <label for="start" id="date"><b>Start date:</b></label>
                                <input type="date" id="date" name="trip-start" value="<?php echo date();?>" min="2019-01-01" max="2020-12-31">
                                <label for="end" id="date"><b>End date:</b></label>
                                <input type="date" id="date" name="trip-end" value="<?php echo date();?>" min="2019-01-01" max="2020-12-31">
                                <textarea name="rmq"  id="remarque" placeholder="Comment"></textarea>
                              
                              
                                <button type="submit" name="add_basket_submit" class="w3-button w3-black w3-round-large">Add to basket <i class="fa fa-shopping-cart"></i></button>
                              </form>
               </div>
        </section>';

}

else {
    header("Location: ../catalogue.php?");
    exit();
}




