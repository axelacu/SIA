<?php
require 'header.php';
?>
    <main>
        <section class="blanc" id="signin">
            <div class="inscription">
                <h1>Sign In</h1>
            </div>
            <p id="texte2">Please fill in this form to sign in.</p>

        <form action="includes/login.inc.php" method="post">
            <div class="signup_in">
                <label for="mailuid"><b>Username</b></label>
                <input type="text" name="mailuid" placeholder="Username/E-mail...">

                <label for="pwd"><b>Password</b></label>
                <input type="password" name="pwd" placeholder="Password...">
                <button type="submit" name="login-submit">Connexion</button>
            </div>
        </form>
    </main>

<?php
require 'footer.php';
?>