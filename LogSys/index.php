<?php
	require 'header.php';
?>
	<main>
        <?php
            if(!isset($_SESSION["USER_NAME"])){
                echo '<p>Vous êtes déconnecté</p>';
            }else{
                echo '<p>Vous êtes connecté</p>';
            }
        ?>

        <!-- Debut du carroussel -->

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <style>

            .carousel-inner img {
                width: 100%; /* Set width to 100% */
                margin: auto;
                min-height:200px;
            }

            /* Hide the carousel text when the screen is less than 600 pixels wide */
            @media (max-width: 600px) {
                .carousel slide {
                    display: none;
                }
            }
        </style>


<body style="background-image: url(images/horizon-ocean.jpg);">

        <div class="containerheader" style="margin : 30px 30px 40px 30px; width: 1200px; ">

            <div style="float: left;width: 600px;" id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <!--<li data-target="#myCarousel" data-slide-to="2"></li>-->
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/plongeur.jpg" alt="Plongeur" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="images/bouteilles_de_gaz.jpg" alt="Bouteilles de gaz" style="width:100%;">
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


            <div class="blanc" style="max-width: 40%; margin:0 0 0 20px; padding: 10px 20px 10px 20px;text-align: justify;">

                <p class="textecdu" style="font-size: 20px; padding-top:10px; font-family: Helvetica; border-bottom: 1px solid #212121;
                padding-bottom: 10px; margin-bottom: 5px"><b>Qui sommes-nous ?</b></p>

                <p class="textecdu" style="font-family: Helvetica; font-size: 13px" > <br> <b>AIRBLIO</b> est une entreprise française installée dans les Vosges depuis 1970, est spécialisée dans
                   l’équipement haut de gamme pour les plongées en mer et l’accompagnement des entreprises.</br></p><p class="textecdu" style="font-family: Helvetica; font-size: 13px" > Elle est actuellement composée de plusieurs équipes qui effectuent des missions sur le monde entier.
                    Son rôle, auprès des clients, est l’installation, la maintenance et l’évolution du matériel.
                    L’entreprise commercialise ses produits et services auprès du domaine professionnel,
                    en particulier auprès de structures de recherche publiques ou privées.
                </p>

                <ul style="padding-top: 20px;padding-right: 10px;">
                    <li style="list-style-type: none;">
                        <p class="textecdu" style="font-family: Helvetica; font-size: 13px; margin-bottom: 10px"><b>Nos offres : </b></p>
                        <a href="services.php" style="font-size: 12px;">Support de surface</a></br>
                        <a href="catalogue.php" style="font-size: 12px;">Vente et location de matériels de plongée</a></br>
                        <a href="services.php" style="font-size: 12px;">Installation de matériels de plongée</a></br>
                        <a href="services.php" style="font-size: 12px;">Maintenance de matériels de plongée</a></br>

                    </li>
                </ul>
            </div>
        </div>
        <!-- Fin du carroussel -->

        </body>
	</main>

<?php
require 'footer.php';
?>




<!-- ANCIEN CARROUSSEL -->

<!--
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!- Indicators --
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!- Wrapper for slides --
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="images/bouteilles_de_gaz.jpg" style="width:45%" alt="Image">
            <div class="carousel-caption">
                <h3>Sell $</h3>
                <p>Money Money.</p>
            </div>
        </div>

        <div class="item">
            <img src="images/plongeur.jpg" style="width:45%" alt="Image">
            <div class="carousel-caption">
                <h3>More Sell $</h3>
                <p>Lorem ipsum...</p>
            </div>
        </div>
    </div>

    <!- Left and right controls --
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
-->