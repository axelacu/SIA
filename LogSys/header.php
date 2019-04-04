<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="AIRBLIOLOGSYS" content="AIRBLIO FOR FUTURE">
		<link rel="stylesheet" href="style.css" />		
		<title></title>
	</head>
	<body>
		<div id="bloc_page">
			<header>
				<div class="container">
					<div id="desktop_logo">
						<span id="logoLink">
							<a href="page1.php">
								<img id="logo_img-responsive" src="images/airblio2.png" alt="AIRBLIO">
							</a>
						</span>
					</div>
						
					
					<!-- Barre de recherche -->
					<div id="colonne2">
						<div id="recherche_p">

							<form action="/search" id="searchthis" method="get">
								<input id="search" name="q" type="text" placeholder="Rechercher" />
							</form>
						</div>
					</div>
					
					<nav>
                        <?php
                        if(!isset($_SESSION['USER_NAME'])){
                            echo '<a href="signup.php" class="button">Sign Up</a>
						        <a href="singin.php" class="button">Login</a>';
                        }else{
                            echo ' <!--<a href="basket.php" class="button">Basket</a> -->
						        <form action="includes/logout.inc.php" method="post" >
                                    <button type="submit" name="logout-submit" class="button">Sign out</button>
                            </form>';
                        }
                        ?>
					</nav>	
				</div>

			</header>
				<div class="container">
					<div id="navigation">
						<nav>
							<ul>
								<li><a href="index.php">Accueil</a></li>
								<li><a href="catalogue.php">Produits</a></li>
								<li><a href="#">Services</a></li>
								<li><a href="#">Assistance</a></li>
							</ul>
						</nav>
					</div>	
				</div>
		</div>