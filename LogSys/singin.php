<?php
require 'header.php';
?>
    <main>
        <h1>Login</h1>

        <form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="Username/E-mail...">
            <input type="password" name="pwd" placeholder="Password...">
            <button type="submit" name="login-submit">Connexion</button>
        </form>
    </main>

<?php
require 'footer.php';
?>