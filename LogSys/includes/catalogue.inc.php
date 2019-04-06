<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 05/04/2019
 * Time: 21:47
 */
//On récupère les images des produits du catalogue

$dir = 'images_catalogue';
$num_of_product_by_page=9;
require 'dbh.inc.php';

//On récupère les enregistrements de la base de données
$req = "SELECT MATERIEL.file_name, MATERIEL.description, MATERIEL.prix, MATERIEL.nom FROM MATERIEL";
$_GET['TEST']=1;
$result = mysqli_query($conn,$req);
echo '<meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
$array_material_name = array();

while($row = mysqli_fetch_row($result)){
    $file_name = $dir."/".$row[0];
    $description = $row[1];
    $prix = $row[2];
    $nom = $row[3];
    $attrbuttes = array($file_name,$description,$prix,$nom);
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
    if($i==0 || $i%3!=0) {
        echo '
        <div class="w3-third">
            <div class="w3-card">
                <div class="w3-container w3-sand w3-center">
                  <img class="w3-border w3-margin-top" src="' . $array_material_name[$i][0] . '" alt="' . $array_material_name[$i][3] . '" style="width:40%">
                   <h5 class="w3-top-left-align">' . $array_material_name[$i][3] . '</h5>
                   <h5>' . $array_material_name[$i][2] . '€' . '</h5> 
                   <p class="w3-padding w3-top-left-align">' . $array_material_name[$i][1] . '</p>       
               </div>
             </div>
        </div>';
    }else{
        echo'
         </div>
         <div class="w3-row-padding w3-margin-top">
         <div class="w3-third">
            <div class="w3-card">
                <div class="w3-container w3-sand w3-center">
                  <img class="w3-border w3-margin-top" src="' . $array_material_name[$i][0] . '" alt="' . $array_material_name[$i][3] . '" style="width:40%">
                   <h5 class="w3-top-left-align">' . $array_material_name[$i][3] . '</h5>
                   <h5>' . $array_material_name[$i][2] . '€' . '</h5> 
                   <p class="w3-padding w3-top-left-align">' . $array_material_name[$i][1] . '</p>       
               </div>
             </div>
        </div>';
    }
}
echo '</div>';

//PAGINATION !

$back_page = (($_GET['page']-1)>0? ($_GET['page']-1):($_GET['page']));
$forward_page = (($_GET['page']+1)<=$_GET['nb_page']? ($_GET['page']+1):($_GET['page']));
echo ' <div class="w3-center w3-padding-32">
            <div class="w3-panel w3-sand w3-round" >
                <div class="w3-bar">
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

