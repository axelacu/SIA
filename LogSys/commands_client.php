<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 07/04/2019
 * Time: 21:03
 */
require 'header.php';
?>

    <main>
        <section>
            <div id="commands">
                <section class="blanc" id="demand" style="width: 110%">
                    <div class="inscription">
                        <h1>My commands</h1>
                    </div>
                    <div class="w3-container">
                        <table class="w3-table w3-bordered">
                            <tr>
                                <th><label> <b>Reference</b></label></th>
                                <!-- DEESCRIPTION ENDROIT OU IL POURRA TELECHARGER LE DEVIS-->
                                <th style="width: 40%"><label> <b>Description</b></label></th>
                                <th style="width: 40%"><label> <b>Date commande</b></label></th>
                                <th style="text-align: center"><label> <b>Debut</b></label></th>
                                <th style="text-align: center"><label> <b>Fin</b></label></th>
                                <th style="text-align: center"><label> <b>Valide</b></label></th>
                            </tr>
                            <?php
                            //On inclue ici le fichier de connexion à la base
                                include ('includes/demands_client.inc.php');
                            ?>
                        </table>
                    </div>
                    <div class="w3-container">
                        <div class="w3-right">
                            <button class="button" style="color: white; width:200px; background: black; margin-top: 10px ;">Payer</button>
                        </div>
                    </div>
                </section>
            </div>


        </section>
    </main>

<?php
require 'footer.php';
?>