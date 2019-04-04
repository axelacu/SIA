<?php
	require 'header.php';
?>
	<main>
        <?php
            if(!isset($_SESSION["USER_NAME"])){
                echo '<p>Vous êtes déconnecté</p>';
            }else{
                echo '<p>Vous êtes connecté</p>';
            }
        ?>
	</main>

<?php
require 'footer.php';
?>
