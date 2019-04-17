<?php
require 'header.php';
?>

<main>

    <section class="blanc" id="signin">
        <div class="inscription">
            <h1>Contactez-nous</h1>
        </div>
        <p id="texte2">Service client : 0 810 564 839</p>

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
