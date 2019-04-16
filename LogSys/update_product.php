<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-16
 * Time: 16:17
 */

require 'header.php';

?>


<main>
    <section>
        <div id="commands">
            <section class="blanc" id="demand">
                <div class="inscription">
                    <h1>Update products</h1>
                </div>
                <div class="w3-container">
                    <table class="w3-table w3-bordered">
                        <tr>
                            <th><label> <b>Reference</b></label></th>
                            <th><label> <b>Article</b></label></th>
                            <th style="text-align: center"><label> <b>Label</b></label></th>
                            <th style="text-align: center"><label> <b>En stock</b></label></th>
                            <th style="width: 10%"><label> <b></b></label></th>
                        </tr>
                        <?php
                            include ('includes/update_product.inc.php');
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