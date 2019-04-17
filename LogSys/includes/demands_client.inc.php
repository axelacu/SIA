<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 11/04/2019
 * Time: 11:10
 */

require 'dbh.inc.php';
require '../Video/Product.php';
require '../Video/Panier.php';

$dir = 'images_catalogue';

$req ='SELECT C.ID_COMMAND,D.ID_DEMAND,O.ID_OFFRE, O.FILE_NAME, O.LABEL, C.DATE_COMMAND,C.DATE_VALIDATION,C.DATE_START,C.DATE_END,D.ID_USER,O.PRIX, C.VALIDATE_COMMAND, C.PAYMENT,D.QUANTITE_DEMAND 
FROM COMMAND C, DEMAND D, OFFRE O
WHERE C.ID_DEMAND = D.ID_DEMAND AND D.ID_OFFRE = O.ID_OFFRE AND C.PAYMENT= 0 AND D.ID_USER ='.$_SESSION['USER_ID'] ;

$result = mysqli_query($conn, $req);
$list_nom_prod = array();
$list_prix = array();
$list_quantite = array();
$basketPaypal = new Panier();
if($result) {
    while ($donnees = mysqli_fetch_row($result)) {
       $file_name = $dir."/".$donnees[3];
       $label = $donnees[4];
       $prix = $donnees[10];
       $quantite = $donnees[13];
        echo '
                    <tr>
                        <td style="width: 200px"><a>r60'.$donnees[0].'</a></td>
                        <td style="width: 600px" ><img src="' . $file_name. '" style="width:40%;" alt = "'.$label.'"><a style="display: block">'.$label.'</a></td>
                        <td style="text-align: center">' . $donnees[5] . '</td>
                        <td style="text-align: center">' . $donnees[7] . '</td>
                        <td style="text-align: center">' . $donnees[8] . '</td>
                        <td style="text-align: center">' . $donnees[10] . '</td>
                    </tr>
        ';
        $product = new Product();
        $product->setName($label);
        $product->setQuantity($quantite);
        $product->setPrice($prix);
        $basketPaypal->addProduct($product);
    }

    $_SESSION['basketPaypal'] = $basketPaypal;



}
