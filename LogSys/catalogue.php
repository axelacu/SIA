<?php
    require 'header.php';
?>

    <meta name="viewport" content="width=device-width, initial-scale=1">


<main>

    <section>
        <div id="catalogue">
            <?php
            //On inclue ici le fichier de connexion à la base
            include('includes/dbh.inc.php');

            //On récupère les images des produits du catalogue
            $dir = 'images_catalogue';

            //On récupère les enregistrements de la base de données
            $req = "SELECT MATERIEL.file_name, MATERIEL.description, MATERIEL.prix, MATERIEL.nom FROM MATERIEL;";

            $result = mysqli_query($conn,$req);


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

            ?>
        </div>
    </section>


</main>

<?php
    require 'footer.php';
?>