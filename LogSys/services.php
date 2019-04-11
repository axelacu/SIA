<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-07
 * Time: 16:30
 */

    require 'header.php';
?>

<main>
    <section>
        <div class="w3-container">
            <h2 class="w3-xxxlarge w3-lobster w3-center" style="color: white;border: black"><u>Services</u></h2>
        </div>

        <div id="services">
            <?php
                include ('includes/services.inc.php');
            ?>
        </div>
    </section>
</main>

<?php
    require 'footer.php';
?>