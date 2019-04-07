<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="AIRBLIOLOGSYS" content="AIRBLIO FOR FUTURE">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link rel="stylesheet" href="style.css" />
		<title></title>
	</head>


	<body>
		<div id="bloc_page">
			<header id="headerheader">
				<div class="containerheader">
					<div id="desktop_logo">
						<span id="logoLink">
							<a href="header.php">
								<img id="logo_img-responsive" src="images/airblio4.png" alt="AIRBLIO">
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

                    <div id="login">
                        <nav>
                            <?php
                            if(!isset($_SESSION['USER_NAME'])){
                                 echo '<a href="signup.php" class="button">Sign Up</a>
                                    <a href="singin.php" class="button">Sign In</a>';
                            }else{
                                echo ' <!--<a href="#" class="button">Basket</a> -->  
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle"  type="button" data-toggle="dropdown">
                                            Mon espace
                                        </button>
                                      <div class="dropdown-menu">
                                        <a id="item-deroulant" class="dropdown-item" href="demands.php">Mes demandes</a>
                                        <a id="item-deroulant" class="dropdown-item" href="commands.php">Mes commandes</a>
                                      </div>
                                    </div>
                                     ';

                            }
                            ?>
                        </nav>
                    </div>

					<div class="sticky" id="navigation">
						<nav>
							<ul>
								<li><a href="index.php" id="acceuil" >Accueil</a></li>
								<li><a href="catalogue.php" id="produit">Produits</a></li>
								<li><a href="#" id="service" >Services</a></li>
								<li><a href="#" id="assistance" >Assistance</a></li>
							</ul>
						</nav>
					</div>	


					
				</div>
			</header>
		</div>
    </body>