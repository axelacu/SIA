<?php
    require 'header.php';
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">


    <style>
        .w3-lobster {
            font-family: "Lobster", serif;
        }
    </style>


<main>
    <section>
        <div class="w3-container">
            <h2 class="w3-xxxlarge w3-lobster w3-center" style="color: white;border: black"><u>Products</u></h2>
            <!--
            <div class="w3-row">
                <select class="w3-select" name="option" style="width:20%">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>

                <select class="w3-select" name="option2" style="width:20%">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>
            -->
        </div>


        <div id="catalogue">
            <?php
                include ('includes/catalogue.inc.php');
            ?>
        </div>

    </section>
</main>

<?php
    require 'footer.php';
?>