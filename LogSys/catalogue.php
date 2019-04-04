<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Catalogue</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="style.css">
		<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
		
		<!--<script src="bootstrap/js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>-->
	</head>

	<body>

		<section id="hero">

			<nav>
				<a href="#" id="espace_pro">Mon espace professionnel</a>
				<a href="#" id="compte">Mon compte</a>
				<a href="#" id="panier">Panier</a>
			</nav>

			<div id="airblio">
				<h1>AIRBLIO</h1>
			</div>

			<div id="menu">
				<a href="#" class="menu_item">Accueil</a>
				<a href="#" class="menu_item">Produits</a>
				<a href="#" class="menu_item">Services</a>
			</div>

		</section>

		<section>
			<div id="catalogue">
				<?php
					//TODO on inclue ici le fichier de connexion à la base
					include('./LogSys/includes/dbh.inc.php');

					//TODO récupérer les images des produits du catalogue
					$dir = 'images_catalogue';


					/*//TODO on récupère les enregistrements de la base de données
					$req_main = $conn->prepare("SELECT 			FROM 	 ORDER BY 		ASC");
					$req_main->execute();*/


					//On crée une boucle pour afficher les photos avec description
					/*while($row = ){
						$file_name = $row['#'];
						$description = $row['description'];
						$prix = $row['prix'];

						//On affiche le résultat
						echo '<table> width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td><img src="'.$dir.'/'.$file_name.'" width="150px" height="113px"></td>
									<td>'.$description.'</td>
								<tr>
							  </table>';
					}*/

				?>
			</div>


		</section>





		<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
	
	</body>

</html>