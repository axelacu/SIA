<?php
require 'header.php';
?>

    <main>
        <section>
            <div id="basket">
                <?php
                //On inclue ici le fichier de connexion à la base
                include ('includes/basket.inc.php');
                ?>
            </div>
        </section>
    </main>

<?php
require 'footer.php';
?>