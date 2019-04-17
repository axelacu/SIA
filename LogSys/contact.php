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
            <fieldset><legend>Vos coordonnées</legend>
                <p><label for="nom">Nom :</label><input type="text" id="nom" name="nom" /></p>
                <p><label for="email">Email :</label><input type="text" id="email" name="email" /></p>
            </fieldset>

            <fieldset><legend>Votre message :</legend>
                <p><label for="objet">Objet :</label><input type="text" id="objet" name="objet" /></p>
                <p><label for="message">Message :</label><textarea id="message" name="message" cols="30" rows="8"></textarea></p>
            </fieldset>

            <div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer le formulaire !" /></div>
        </form>
    </section>


</main>




<?php
require 'footer.php';
?>
