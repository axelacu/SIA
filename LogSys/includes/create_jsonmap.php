<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 18/04/2019
 * Time: 11:27
 */

$myArr = array("John", "Mary", "Peter", "Sally");

$myJSON = json_encode($myArr);

echo $myJSON;

$template_bases = '
        {
                "type": "Feature",
                "properties": {
                    "id": "marker-ipmqv05zf",
                    "title": "intervention n°4 - Malaisie",
                    "gross-acres": "2075",
                    "location": "Sipadan, Malaisie",
                    "crop": "Intervention",
                    "Equipes": false,  "Bases":false,
                    "Interventions": true,
                    "Materiels": false,
                    "marker-size": "large",
                    "marker-color": "#FF0000",
                    "marker-symbol": ""
                },
                "geometry": {
                    "coordinates": [
                        118.613549,
                        4.479224
        
                    ],
                    "type": "Point"
                }
            }
    ';

$template_intervention ='{
        "type": "Feature",
        "properties": {
            "id": "marker-ipmqx4i5g",
            "title": "Base de Saint Denis de la Réunion",
            "gross-acres": "743",
            "location": "Base de Saint Denis de la Réunion",
            "crop": "Equipes",
            "Equipes": false,  "Bases":true,
            "Interventions": false,
            "Materiels": false,
            "marker-size": "large",
            "marker-color": "#00FF00",
            "marker-symbol": ""
        },
        "geometry": {
            "coordinates": [
                55.44820000000004,
                -20.8789
            ],
            "type": "Point"
        }
    }';


$obj = json_decode($test);
echo $obj->{"type"};