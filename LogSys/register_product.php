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

    <script type="text/javascript">
        function masquer_div(id)
        {
            if (document.getElementById('product').checked)
            {
                document.getElementById(id).style.display = 'block';
            }
            if (document.getElementById('serv').checked)
            {
                document.getElementById(id).style.display = 'none';
            }
        }
    </script>

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

        section {
            width:50%;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        textarea{
            width: 100%;
        }

        input[type=radio] {
            margin: 10px 10px 20px 0;
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

        <form action="includes/register_product.inc.php" method="post" enctype="multipart/form-data">
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
                    <input type="number" min="0" name="qty" step="10" id="quantity" value=1><br/>
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
