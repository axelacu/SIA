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

    <section class="blanc">
        <div class="inscription">
            <h1>Update product</h1>
        </div>

        <form action="includes/update_product.inc.php" method="post" enctype="multipart/form-data">
            <div id="signup">

                <label for="type"><b>Type</b></label><br/>
                <input type="radio" name="choix" value="Product" id="product" onClick="masquer_div('a_masquer');">Product<br>
                <input type="radio" name="choix" value="Service" id="serv" onClick="masquer_div('a_masquer');">Service<br>

                <label for="label"><b>Name</b></label>
                <input type="text" name="label" placeholder="Name">

                <label for="description"><b>Description</b></label>
                <textarea name="desc"  id="description" placeholder="Description of the product"></textarea>

                <label for="price"><b>Price</b></label>
                <input type="text" name="price" placeholder="Price">

                <div id="a_masquer">
                    <label for="quantity"><b>Quantity</b></label><br/>
                    <input type="number" min="0" name="qty" id="quantity" value=1><br/>
                </div>

                <label for="picture">Fichier (tous formats | max. 1 Mo) :</label>
                <input type="file" name="picture" />

                <br/>
                <br/>

                <div class="clearfix">
                    <button type="button" class="cancelbtn">Cancel</button>
                    <button type="submit" name="register-submit" class="signupbtn">Register</button>
                </div>
            </div>
        </form>
    </section>

</main>



<?php
require 'footer.php';
?>