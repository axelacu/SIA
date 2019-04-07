<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-07
 * Time: 17:18
 */

require 'dbh.inc.php';

$dir = 'images_services';
$req = "SELECT DISTINCT SERVICE.label, SERVICE.file_name, SERVICE.description FROM SERVICE";
$result = mysqli_query($conn,$req);


echo '<meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">';

//$i=0;

while($row = mysqli_fetch_row($result)) {
    $label = $row[0];
    $file_name = $dir . "/" . $row[1];
    $description = $row[2];


    echo '<div class="w3-row-padding w3-margin-top">
            <div class="w3-two">
                <div class="w3-card">
                    <div class="w3-container w3-highway-blue w3-center">
                        <h3 class="w3-top-left-align">' . $label . '</h3>
                        <div class="w3-display-container">
                            <img class="w3-circle w3-margin" src="' . $file_name . '" alt="' . $file_name . '" style="width:30%">
                            <div class="w3-display-middle w3-display-hover">
                                <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
                            </div>
                        </div>
                        <h5>' . $description . '</h5>
                    </div>
                </div>
            </div>
          </div>';
}

