<?php

 require 'header.php';
 ?>

<meta charset="UTF-8">

<link rel='stylesheet' href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css'>

<link rel="stylesheet" href="style_mapmonde.css">

    <main>

            <!-- filtering of crops -->
            <nav class='menu-ui'>
                <a href='#' class='activenew' data-filter='all'>Voir tout</a>
                <a href='#' class='Bases' data-filter='Bases'>Bases</a>
                <a href='#' data-filter='Equipes'>Equipes</a>
                <a href='#' data-filter='Interventions'>Interventions</a>
                <a href='#' data-filter='Materiels'>Materiels</a>
            </nav>



            <!-- sidebar -->
            <div class='sidebar'>
                <div class='heading'>
                    <h1>Tout</h1>
                </div>
                <div id='listings' class='listings'></div>
            </div>

            <!-- map itself -->
            <div id='map' class="map"></div>
            <script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>
            <script src='https://code.jquery.com/jquery-1.11.0.min.js'></script>



            <script  src="includes/mapmonde.js"></script>

    </main>

<?php
    require 'footer.php';
?>
