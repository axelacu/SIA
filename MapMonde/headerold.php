<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="AIRBLIOLOGSYS" content="AIRBLIO FOR FUTURE">
    <title></title>
</head>
<body>
<header>
    <nav>
        <a href="#"></a>
        <img src="image/logo.png" alt="logo">
    </nav>
    <ul>
        <li><a href="index.php">Acceuil</a></li>
        <li><a href="#">Produit</a></li>
        <li><a href="#">Service</a></li>
        <li><a href="#">Assistance</a></li>
    </ul>
    <div>
        <?php
        if(!isset($_SESSION['USER_NAME'])){
            echo '<form action="includes/login.inc.php" method="post">
                            <input type="text" name="mailuid" placeholder="Username/E-mail...">
                            <input type="password" name="pwd" placeholder="Password...">
                            <button type="submit" name="login-submit">Connexion</button>
                            </form>
                            <a href="signup.php">S\'inscrire</a>';
        }else{
            echo '<form action="includes/logout.inc.php" method="post">
                            <button type="submit" name="logout-submit">Déconnexion</button>
                            </form>';
        }
        ?>
    </div>
</header>