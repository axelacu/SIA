<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 07/04/2019
 * Time: 21:03
 */
require 'header.php';
?>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <main>
        <section>
            <div id="commands">
                <section class="blanc" id="demand" style="width: 80%">
                    <div class="inscription">
                        <h1>My commands</h1>
                    </div>
                    <div class="w3-container">
                        <table class="w3-table w3-bordered">
                            <tr>
                                <th><label> <b>Reference</b></label></th>
                                <!-- DEESCRIPTION ENDROIT OU IL POURRA TELECHARGER LE DEVIS-->
                                <th style="width: 30%"><label> <b>Description</b></label></th>
                                <th style="width: 20%"><label> <b>Date commande</b></label></th>
                                <th style="text-align: center"><label> <b>Start</b></label></th>
                                <th style="text-align: center"><label> <b>End</b></label></th>
                                <th style="text-align: center"><label> <b>Valide</b></label></th>
                            </tr>
                            <?php
                            //On inclue ici le fichier de connexion à la base
                                include ('includes/demands_client.inc.php');
                            ?>
                        </table>
                    </div>
                    <?php
                    //On inclue ici le fichier de connexion à la base
                    include ('includes/buttonPayment.inc.php'); //ici il y avait le code du bouton
                    ?>
                </section>
            </div>


        </section>
    </main>

<?php
require 'footer.php';
?>