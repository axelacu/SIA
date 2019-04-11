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



        <div class="container" style="margin-bottom: 30px;">
            <h2>Bienvenue !</h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
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
        </div>


        <!-- Fin du carroussel -->


	</main>

<?php
require 'footer.php';
?>