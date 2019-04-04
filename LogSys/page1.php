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
						<a href="#" class="button">Sign Up</a>
						<a href="#" class="button">Login</a>
					</nav>	
				</div>
				
				
					
				<!-- <div>
				 	<form action="includes/login.inc.php" method="post">
				 		<input type="text" name="mailuid" placeholder="Username/E-mail...">
			 			<input type="password" name="pwd" placeholder="Password...">
			 			<button type="submit" name="login-submit">Connexion</button>
				 	</form>
				 	<a href="signup.php">S'inscrire</a>
				 	<form action="includes/logout.inc.php" method="post">
				 		<button type="submit" name="logout-submit">Déconnexion</button>
				 	</form>
				</div> -->
				
				
			</header>
				<div class="container">
					<div id="navigation">
						<nav>
							<ul>
								<li><a href="index.php">Acceuil</a></li>
								<li><a href="#">Produit</a></li>
								<li><a href="#">Service</a></li>
								<li><a href="#">Assistance</a></li>
							</ul>
						</nav>
					</div>	
				</div>
		</div>
</html>