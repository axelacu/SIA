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
                //On inclue ici le fichier de connexion à la base
                include('includes/dbh.inc.php');

                //On récupère les images des produits du catalogue
                $dir = 'images_catalogue';


                //On récupère les enregistrements de la base de données
                $req_main = $conn->prepare("SELECT 			FROM 	 ORDER BY 		ASC");
                $req_main->execute();


                //On crée une boucle pour afficher les photos avec description
                while($row = ){
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
                }

                ?>
            </div>
        </section>





		<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
	
	</body>

</html>










<style>
    .carousel-inner img {
        width: 100%; /* Set width to 100% */
        margin: auto;
        min-height:200px;
    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
        .carousel-caption {
            display: none;
        }
    }
</style>

<main>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images_catalogue/stab-solid.jpg" style="width:40%" alt="Image">
                <div class="carousel-caption">
                    <h3>Sell $</h3>
                    <p>Money Money.</p>
                </div>
            </div>

            <div class="item">
                <img src="images_catalogue/masque-de-plongee-avec-verres-correcteurs-pro.jpg" style="width:40%" alt="Image">
                <div class="carousel-caption">
                    <h3>More Sell $</h3>
                    <p>Lorem ipsum...</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>






    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Bloc de plongée</div>
                    <div class="panel-body"><img src="images_catalogue/bloc-de-plongee.jpg" class="img-responsive" style="width:40%" alt="Image"></div>
                    <div class="panel-footer">-Description-</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">Chronomètre</div>
                    <div class="panel-body"><img src="images_catalogue/chronometre2.jpg" class="img-responsive" style="width:40%" alt="Image"></div>
                    <div class="panel-footer">-Description-</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-success">
                    <div class="panel-heading">Tourelle de plongée</div>
                    <div class="panel-body"><img src="images_catalogue/tourelle-de-plongée.jpg" class="img-responsive" style="width:40%" alt="Image"></div>
                    <div class="panel-footer">-Description-</div>
                </div>
            </div>
        </div>
    </div>






