<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-16
 * Time: 16:17
 */

require 'header.php';
require 'includes/dbh.inc.php';

?>


<main>
    <section>
        <div id="commands">
            <section class="blanc" id="demand">
                <div class="inscription">
                    <h1>Update stocks</h1>
                </div>
                <div class="w3-container">
                    <table class="w3-table w3-bordered">
                        <tr>
                            <th><label> <b>Reference</b></label></th>
                            <th><label> <b>Article</b></label></th>
                            <th style="text-align: center"><label> <b>Label</b></label></th>
                            <th style="text-align: center"><label> <b>In stock</b></label></th>
                            <th style="width: 10%"><label> <b></b></label></th>
                        </tr>


                        <?php

                        //On récupère les produits de la base de données
                        $dir = 'images_catalogue';

                        $req = "SELECT DISTINCT OFFRE.id_offre, OFFRE.file_name, OFFRE.label, OFFRE.quantite, OFFRE.type_offre FROM OFFRE WHERE type_offre=0";
                        $result = mysqli_query($conn,$req);

                        if($result) {
                            while ($donnees = mysqli_fetch_row($result)) {
                                echo '
                                    <tr>
                                        <td>'. $donnees[0] .'</td>
                                        <td style="width: 20%"> <div class="w3-cell">
                                            <img src="./images_catalogue/' . $donnees[1] . '" style="width:40%">
                                        </td>
                                        <td style="text-align: center">' . $donnees[2] . '</td>
                                        <td style="text-align: center">' . $donnees[3] . '</td>
                                        <td style="text-align: right; margin: 10px 10px; ">
                                            
                                            <form action="includes/update_stock.inc.php" method="post" enctype="multipart/form-data" style="display: flex">
                                                <input name="qty" id="quantity" value=0 style="flex: 1; padding: 20px; " type="number" min="-200" max="200" step="5">
                                                <button type="submit" class="button" formaction="includes/update_stock.inc.php?update=true&id=' . $donnees[0] .'" style="flex: 2;color: white; background: black ">Update stock</button>
                                            </form>
                                                
                                        </td>
                                    </tr>
                            ';
                            }
                        }
                        ?>
                    </table>
                </div>
            </section>
        </div>


    </section>
</main>



<?php
require 'footer.php';
?>