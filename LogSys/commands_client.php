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
                <section class="blanc" id="demand">
                    <div class="inscription">
                        <h1>My commands</h1>
                    </div>
                    <div class="w3-container">
                        <table class="w3-table w3-bordered">
                            <tr>
                                <th><label> <b>Reference</b></label></th>
                                <th style="width: 40%"><label> <b>Description</b></label></th>
                                <th style="text-align: center"><label> <b>Date de Debut</b></label></th>
                                <th style="text-align: center"><label> <b>date de fin</b></label></th>
                                <th style="text-align: center"><label> <b>quantite</b></label></th>
                                <th style="text-align: center"><label> <b>Action</b></label></th>
                            </tr>
                            <?php
                            //On inclue ici le fichier de connexion à la base
                                include ('includes/demands_client.inc.php');
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