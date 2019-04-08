<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-08
 * Time: 14:40
 */

if (isset($_POST['register-submit'])) {
    require 'dbh.inc.php';

    $name = $_POST['name'];
    $description = $_POST['desc'];
    $price = $_POST['price'];
    $quantity = $_POST['qty'];
    $file = $_POST['picture'];

    $target_dir = "images_catalogue/";

    if (empty($name) || empty($description) || empty($price) || empty($file)) {
        header("Location: ../register_product.php?error=emptyfields");
    }
    //vérifier que le prix est un nombre
    else if (!preg_match("/^[0-9]*$/", $price)) {
        header("Location: ../register_product.php?error=invalidprice&price=".$price);
    }
    //vérifier que la quantité est plus que 0
    else if (!preg_match("/^[0-9]*$/", $quantity) || $quantity==0) {
        header("Location: ../register_product.php?error=invalidquantity&quantity=".$quantity);
    }
    else if ($_FILES['mon_fichier']['error'] > 0) {
        header("Location: ../register_product.php?error=invalidfile");
    }
    else{
        //déplacer le fichier dans le dossier images_produit
        //$resultat = move_uploaded_file($_FILES['mon_fichier']['tmp_name'],'images_catalogue');

        /*if($resultat)
            header("Location: ../index.php?error=invalidfile");*/

        header("Location: ../register_product.php?error=".$_FILES['picture']['tmp_name']);

        /*//SAFE SQL REQUEST
        $sql = "SELECT LABEL FROM MATERIEL WHERE LABEL=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../register_product.php?error=sqlerror1");
            exit();

        } else{
            //s for string is the data type, b = boolean, etc..
            mysqli_stmt_bind_param($stmt, "s", $name);
            mysqli_stmt_execute($stmt);
            //take result and store back dans la variable en parametre
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt); //verify combien de ligne dans la requete.
            if($resultCheck > 0){
                header("Location: ../register_product.php?error=existingproduct");
                exit();
            } else{
                $sql = "INSERT INTO MATERIEL (LABEL,DESCRIPTION,PRIX,QUANTITE,FILE_NAME) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../register_product.php?error=sqlerror2");
                    exit();
                } else{
                    //J'ai trois placeholder donc il me faut 3 s, trois string. car mes trois parametres c'est des string
                    mysqli_stmt_bind_param($stmt, "sssis", $name, $description, $price, $quantity, $file);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../register_product.php?register_product=success");
                    exit();
                }

            }

        }
        //closing  the STATEMENT !!!!!
        mysqli_stmt_close($stmt);
        mysqli_close($conn);*/

    }


}else{
    header("Location: ../register_product.php?");
    exit();
}