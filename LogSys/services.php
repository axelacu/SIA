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
        <!--<div class="w3-container">
            <h2 class="w3-xxxlarge w3-center" style="font-family:pt_sansbold; color: #EEEEEE;border: black">Services</h2>
        </div>-->

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