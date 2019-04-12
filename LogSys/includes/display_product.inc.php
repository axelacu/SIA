<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-09
 * Time: 18:10
 */

require 'dbh.inc.php';

$id_user = $_SESSION['USER_ID'];
?>

    <script type="text/javascript">
        function add_to_basket(quantity)
        {
            alert('coucou');

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "display_product.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("mavariable1=" + escape(quantity));

            <?php
                $mavariable2=$_POST['mavariable1'];

                echo $mavariable2;

                $sql = "INSERT INTO DEMAND (DATE_DEMANDE, REMARQUE, ID_USER, ID_OFFRE, DATE_START, DATE_END, ACCEPTED, QUANTITE_DEMAND) VALUES (DATE_FORMAT(date, '%d-%m-%Y'),?,?,?,?,?,0,?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    //header("Location: ../display_product.php?error=sqlerror1");
                    //exit();
                    ?>
                        alert('laaaa');
                    <?php
                } else{
                    ?>
                        alert('ok');
                    <?php
                    mysqli_stmt_bind_param($stmt, "sssisi", $remarque, $id_user, $id_offre, $mavariable2);
                    mysqli_stmt_execute($stmt);

                }
            ?>
            alert('fin');
        }
    </script>

<?php

if (isset($_GET['label']) && isset($_GET['type_offre']) && isset($_GET['file_name']) && isset($_GET['description']) && isset($_GET['prix'])) {
    $attributes = array($_GET['label'], $_GET['type_offre'], $_GET['file_name'], $_GET['description'], $_GET['prix']);


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
            
            input[type=date], #start, textarea, select {
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
                        echo '<div>
                                <label for="quantity"><b>Quantity:</b></label><br/>
                                <input type="number" min="0" max="100" name="qty" id="quantity" value=0><br/>
                                <label for="start" id="start"><b>Location:</b></label>';
                                include('pays.inc.php');
                        echo '
                                <label for="start" id="start"><b>Start date:</b></label>
                                <input type="date" id="start" name="trip-start" value="<?php echo date();?>" min="2019-01-01" max="2020-12-31">
                                <label for="start" id="start"><b>End date:</b></label>
                                <input type="date" id="start" name="trip-start" value="<?php echo date();?>" min="2019-01-01" max="2020-12-31">
                                <textarea name="rem"  id="remarque" placeholder="Remarque"></textarea>
                              </div>
                              <form action="includes/add_to_basket.inc.php" method="post">
                                <button type="submit" name="add_basket" class="w3-button w3-black w3-round-large">Add to basket <i class="fa fa-shopping-cart"></i></button>
                              </form>
               </div>
        </section>';

}

else {
    header("Location: ../catalogue.php?");
    exit();
}




