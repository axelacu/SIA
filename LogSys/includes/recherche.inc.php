<?php

// include("includes/sqlconnect.php");

require 'dbh.inc.php';

$count = "";
$req = ('SELECT DISTINCT OFFRE.file_name, OFFRE.description, OFFRE.prix, OFFRE.label, OFFRE.type_offre  FROM OFFRE WHERE label ORDER BY label ASC');
$dir = 'images_catalogue';
$num_of_product_by_page=10000;

    if(isset($_GET['q']) && !empty($_GET['q'])) {

        $q = htmlspecialchars($_GET['q']);

        $req = ('SELECT DISTINCT OFFRE.file_name, OFFRE.description, OFFRE.prix, OFFRE.label, OFFRE.type_offre  FROM OFFRE WHERE label LIKE "%'.$q.'%" ORDER BY label ASC');
    }

$articles = mysqli_query($conn,$req);
$count = mysqli_num_rows($articles);

echo('<div class="contenair_navsection">
        <section class="wrapper_navsection">
            <div class="titre_navsection">
                Résultats de la recherche
            </div>

            <section id="produits">
                <div id>
                    <div id="conteneur_result_recherche">
                        <div id=result_recherche>                         
                            Il y a ').$count.(' produit(s).<br>
                        </div>
                    </div>

                </div>
            </section>

        </section>
    </div>');

$_GET['TEST']=1;
echo '<meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">';

$array_material_name = array();

while($row = mysqli_fetch_row($articles)) {
    $file_name = $dir . "/" . $row[0];
    $description = $row[1];
    $prix = $row[2];
    $nom = $row[3];
    $type = $row[4];
    $attributes = array($file_name,$description,$prix,$nom,$type);
    array_push($array_material_name, $attributes);
}


if(!isset($_GET['page'])){
    $_GET['page'] = 1;
    $_GET['nb_page'] = ceil(sizeof($array_material_name)/$num_of_product_by_page);
}else{
    if($_GET['page']>$_GET['nb_page']){
        die("ERROR PAGE".$_GET['page']);
    }
}
echo '<div class="w3-row-padding w3-margin-top">';

for($i =($_GET['page']-1)*$num_of_product_by_page  ; $i<($num_of_product_by_page*$_GET['page']) && $i<sizeof($array_material_name);$i++){
    if(!($i==0 || $i%3!=0)) {
        echo '
         </div>
         <div class="w3-row-padding w3-margin-top">';
    }
    echo '
    <div class="w3-third">
        <div class="w3-card">
            <div class="w3-container w3-white w3-center">
              <div class="w3-display-container w3-border w3-margin-top">
                  <img class=" w3-margin-top w3-margin-bottom" src="' . $array_material_name[$i][0] . '" alt="' . $array_material_name[$i][3] . '" style="width:40%">
                    <div class="w3-display-middle w3-display-hover">
                        <a href="display_product.php?label=' . $array_material_name[$i][3] .'&type_offre='.$array_material_name[$i][4].'&file_name='.$array_material_name[$i][0].'&description='.$array_material_name[$i][1].'&prix='.$array_material_name[$i][2].'" 
                            target="_blank">
                            <button type="submit" name="display_product" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
                        </a>
                    </div>
              </div>
              <div id="lien_catalogue">
                <a href="display_product.php?label=' . $array_material_name[$i][3] .'&type_offre='.$array_material_name[$i][4].'&file_name='.$array_material_name[$i][0].'&description='.$array_material_name[$i][1].'&prix='.$array_material_name[$i][2].'">
                    <h5 class="w3-top-left-align"><b>' . $array_material_name[$i][3] . '</b></h5>
                </a>
                <h5><b>' . $array_material_name[$i][2] . '€' . '</b></h5> 
              </div>
           </div>
         </div>
    </div>';

}
echo '</div>';

//PAGINATION !

/* $back_page = (($_GET['page']-1)>0? ($_GET['page']-1):($_GET['page']));
$forward_page = (($_GET['page']+1)<=$_GET['nb_page']? ($_GET['page']+1):($_GET['page']));
echo ' <div class="w3-center w3-padding-32">
            <div class="w3-panel w3-round w3-highway-blue">
                <div class="w3-bar w3-margin">
                    <a href="catalogue.php?page='.$back_page.'&nb_page='.$_GET['nb_page'].'" class="w3-bar-item w3-button w3-hover-black">«</a>';

for($i=1 ; $i<=$_GET['nb_page'] ; $i++){
    if($_GET['page'] == $i) {
        echo '          <a href="recherche.php?q=' . $q . '?page=' . $i . '&nb_page=' . $_GET['nb_page'] . '" class="w3-bar-item w3-black w3-button">' . $i . '</a>';
    }else{
        echo '          <a href="recherche.php?q=' . $q . '?page=' . $_GET['nb_page'] . '" class="w3-bar-item w3-button w3-hover-black">' . $i . '</a>';
    }
}
echo '            <a href="recherche.php?page='.$forward_page.'&nb_page='.$_GET['nb_page'].'" class="w3-bar-item w3-button w3-hover-black">»</a>
                </div>
            </div>
     </div>'; */



