<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 05/04/2019
 * Time: 21:47
 */

require 'dbh.inc.php';

//On récupère les images des produits du catalogue
$dir = 'images_catalogue';
$num_of_product_by_page=9;


//On récupère les enregistrements de la base de données
$req = "SELECT DISTINCT OFFRE.file_name, OFFRE.description, OFFRE.prix, OFFRE.label, OFFRE.type_offre 
        FROM OFFRE WHERE type_offre=0;";
$_GET['TEST']=1;
$result = mysqli_query($conn,$req);
echo '<meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">';

$array_material_name = array();

while($row = mysqli_fetch_row($result)){
    $file_name = $dir."/".$row[0];
    $description = $row[1];
    $prix = $row[2];
    $nom = $row[3];
    $type = $row[4];
    $attrbuttes = array($file_name,$description,$prix,$nom,$type);
    array_push($array_material_name, $attrbuttes);
}
//DEFINE VARIABLE FOR PAGINATION.
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
            <div class="w3-container w3-highway-blue w3-center">
              <div class="w3-display-container">
                  <img class="w3-border w3-margin-top" src="' . $array_material_name[$i][0] . '" alt="' . $array_material_name[$i][3] . '" style="width:40%">
                    <div class="w3-display-middle w3-display-hover">
                        <a href="display_product.php?label=' . $array_material_name[$i][3] .'&type_offre='.$array_material_name[$i][4].'&file_name='.$array_material_name[$i][0].'&description='.$array_material_name[$i][1].'&prix='.$array_material_name[$i][2].'" 
                            target="_blank">
                            <button type="submit" name="display_product" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
                        </a>
                    </div>
              </div>
               <h5 class="w3-top-left-align">' . $array_material_name[$i][3] . '</h5>
               <h5>' . $array_material_name[$i][2] . '€' . '</h5> 
           </div>
         </div>
    </div>';

}
echo '</div>';

//PAGINATION !

$back_page = (($_GET['page']-1)>0? ($_GET['page']-1):($_GET['page']));
$forward_page = (($_GET['page']+1)<=$_GET['nb_page']? ($_GET['page']+1):($_GET['page']));
echo ' <div class="w3-center w3-padding-32">
            <div class="w3-panel w3-round w3-highway-blue">
                <div class="w3-bar w3-margin">
                    <a href="catalogue.php?page='.$back_page.'&nb_page='.$_GET['nb_page'].'" class="w3-bar-item w3-button w3-hover-black">«</a>';

for($i=1 ; $i<=$_GET['nb_page'] ; $i++){
    if($_GET['page'] == $i) {
        echo '          <a href="catalogue.php?page=' . $i . '&nb_page=' . $_GET['nb_page'] . '" class="w3-bar-item w3-black w3-button">' . $i . '</a>';
    }else{
        echo '          <a href="catalogue.php?page=' . $i . '&nb_page=' . $_GET['nb_page'] . '" class="w3-bar-item w3-button w3-hover-black">' . $i . '</a>';
    }
}
echo '            <a href="catalogue.php?page='.$forward_page.'&nb_page='.$_GET['nb_page'].'" class="w3-bar-item w3-button w3-hover-black">»</a>
                </div>
            </div>
     </div>';

/*
    <div class="w3-quarter">
      <img src="/image_catalogue/bloc-de-plongee.jpg" alt="Sandwich" style="width:100%">
      <h3>The Perfect Sandwich, A Real NYC Classic</h3>
      <p>Just some random text, lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
    <div class="w3-quarter">
      <img src="/image_catalogue/chronometre2.jpg" alt="Steak" style="width:100%">
      <h3>Let Me Tell You About This Steak</h3>
      <p>Once again, some random text to lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
    <div class="w3-quarter">
      <img src="/image_catalogue/compresseur.jpg" alt="Cherries" style="width:100%">
      <h3>Cherries, interrupted</h3>
      <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
      <p>What else?</p>
    </div>
    <div class="w3-quarter">
      <img src="/image_catalogue/pavillon.jpg" alt="Pasta and Wine" style="width:100%">
      <h3>Once Again, Robust Wine and Vegetable Pasta</h3>
      <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
  </div>'; */
/*
//On crée une boucle pour afficher les photos avec description
while($row = mysqli_fetch_row($result)){
    $file_name = $row[0];
    $description = $row[1];
    $prix = $row[2];
    $nom = $row[3];

    //On affiche le résultat
    echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><p>'.$nom.'</p><img src="'.$dir.'/'.$file_name.'" width="150px" height="113px"></td>
                                <td>'.$description.'</td>
                                <td>'.$prix.'</td>
                            </tr>
                          </table>';
}
*/

