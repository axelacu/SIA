<?php
require 'header.php';
?>

<main>

    <section class="blanc" id="signin">
        <div class="inscription">
            <h1>Contactez-nous</h1>
        </div>
        <p id="texte2">Service client : 0 810 564 839</p>

        <?php

        if(isset($_GET['success'])) {
            echo ' <p style="color: green; font-weight: bolder;" id="texte2">Votre message nous est bien parvenu !</p>';
        }
        if(isset($_GET['error'])) {
            echo ' <p style="color: red; font-weight: bolder;" id="texte2">L\'envoi du mail a échoué, veuillez réessayer SVP.</p>';
        }
        if(isset($_GET['invalide'])) {
            echo ' <p style="color: red; font-weight: bolder;" id="texte2">Vérifiez que tous les champs soient bien remplis et que l\'email soit sans erreur.</p>';
        }
        ?>

        <form id="contact" method="post" action="traitement_formulaire.php">
            <div class="signup_in">

                <label for="username"><b>Nom</b></label>
                <input type="text" name="nom" placeholder="Nom">

                <label for="email"><b>Email</b></label>
                <input type="text" name="email" placeholder="E-mail">

                <label for="psw"><b>Objet</b></label>
                <input type="text" name="objet" placeholder="Objet">

                <textarea style="width: 100%" name="message"  id="remarque_contact" placeholder="Remarque"></textarea>

                <div style="padding-top: 15px" class="clearfix">
                    <input type="submit" name="envoi" class="signupbtn" style="width: 100%" value="Envoyer">
                </div>
            </div>




        </form>
    </section>


</main>




<?php
require 'footer.php';
?>
