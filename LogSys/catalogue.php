<?php
    require 'header.php';
?>

<main>
    <section>
        <div id="catalogue">
            <?php
            //On inclue ici le fichier de connexion à la base
            include ('includes/catalogue.inc.php');
            ?>
        </div>
    </section>
</main>

<?php
    require 'footer.php';
?>