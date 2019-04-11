<?php
    require 'header.php';
?>

<main>
    <div id="catalogue">
        <?php
        include ('includes/catalogue.inc.php');
        ?>
    </div>


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

</main>

<?php
    require 'footer.php';
?>