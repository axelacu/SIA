<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 12/04/2019
 * Time: 14:17
 */
require 'header.php';
?>

    <main>
        <section>
            <div id="commands">
                <section class="blanc" id="demand">
                    <div class="inscription">
                        <h1>DEMANDES DES CLIENTS</h1>
                    </div>
                    <div class="w3-container">

                            <?php
                                require 'includes/command_pro.inc.php';
                            ?>


                    </div>
                </section>
            </div>


        </section>
    </main>

<?php
require 'footer.php';
?>