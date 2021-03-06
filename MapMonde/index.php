<?php
	require 'header.php';
?>
	<main>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style_boutiques.css">
        <link rel="stylesheet" href="css/style_button.css">


        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

        <style>
            #map_canvas2 {
                width: 100%;
                height: 500px;
                border: 1px solid black;
            }

            input {
                height: 50px;
                line-height: 50px;
                font-size: 30px;
                margin: 1em 0;
                padding: .25em;
            }

            .hoverMe {
                background: #595f7f;
                height: 40px;
                width: 200px;
                border: 0;
                color: #fff;
                border: 1px solid #fff;
                text-align: center;
                padding: 0;
                overflow: hidden;
                position: relative;
                cursor: pointer;
            }

            .hoverMe:after {
                background: #13b5c7;
                height: 40px;
                width: 100%;
                border: 0;
                color: #66676d;
                border: 1px solid #e600e5;
                text-align: center;
                content: 'Voir la boutique';
                display: block;
                position: absolute;
                top: -110%;
                left: -1px;
                line-height: 40px;
                transition: all 0.5s ease-in-out;
            }

            .hoverMe:hover:after {
                position: absolute;
                top: -1px;
                left: -1px;
            }
            .ensemble-button{
                float: left;
            }
            }
        </style>

        <div id="vue-map">
            <div class="input-group mb-3">
                <input id="autocompleteInput" type="text" class="form-control" placeholder="Entrez votre adresse" style="margin-top:15px; text-align:center;">

            </div>

            <div class="ensemble-button">
                <button class="button">Matériel</button>
                <button class="button">Equipe</button>
                <button class="button">Intervention</button>
            </div>


            <div class="row" >
                <div class="col-8"> <div id="map_canvas2"></div></div>
                <div class="col-4" style="overflow:scroll;height:500px;">
                    <h2 v-if="noVisibleMarkers">Il n'y a pas de boutiques proches de votre adresse à moins de 400km :</h2>
                    <ul class="" id="results-list" v-if="currentZoom > zoomTreshold">

                        <li v-for="(marker, i) in visibleMarkers" >
                            <strong>{{ marker.name }}</strong><br/>
                            <strong>Adresse :</strong><br/>
                            <span>{{ marker.boutique }}</span><br/>
                            <span>Livraison en magasin : Oui</span><br/>
                            <span v-if="currentLocation">Distance depuis votre adresse : {{ Math.round(marker.distanceFromCenter / 1000) + ' km' }}<br/></span>

                            <button class="hoverMe" v-bind:data-id='marker.id' @click='centerMapToMarker'>Voir sur la carte</button>

                        </li>

                    </ul>
                </div>
            </div>
            <h2 v-else>Il y a {{ visibleMarkers.length }} boutiques, Si vous souhaitez afficher des magasins spécifiques, veuillez zoomer ou tapez sur la carte.</h2>
        </div>



        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlfHdTSE_d9zwwYKs5gbL01mHElMLCFgE&libraries=places,geometry"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>

        <!--
        <div class="bouton">
            <input type="button" value="Matériel" href="lien"/>
        </div>
        <div class="bouton">
            <input type="button" value="Èquipe" href="lien"/>
        </div>
        <div class="bouton">
            <input type="button" value="Intervention" href="lien"/>
        </div>
        -->
        <script  src="AIRBLIO.js"></script>

    </main>

<?php
require 'footer.php';
?>
