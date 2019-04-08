<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-08
 * Time: 14:41
 */

require 'header.php';

?>

<main>
    <style>
        * {box-sizing: border-box}
        /* Full-width input fields */
        input[type=number], textarea {
            width: 20%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        textarea{
            width: 100%;
        }

        /* Add a background color when the inputs get focus */
        input[type=number]:focus {
            background-color: #ddd;
            outline: none;
        }
    </style>

    <section class="blanc">
        <div class="inscription">
            <h1>Register a product</h1>
        </div>

        <form action="includes/register_product.inc.php" method="post">
            <div id="signup">

                <label for="name"><b>Name</b></label>
                <input type="text" name="name" placeholder="Name" style="font">

                <label for="description"><b>Description</b></label>
                <textarea name="desc"  id="description" placeholder="Description of the product"></textarea>

                <label for="price"><b>Price</b></label>
                <input type="text" name="price" placeholder="Price">

                <label for="quantity"><b>Quantity</b></label><br/>
                <input type="number" name="qty" value=0><br/>


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
