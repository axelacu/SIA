<?php
    require 'header.php';
?>


<main>

    <section>
        <div id="catalogue">
            <?php
                //On inclue ici le fichier de connexion à la base
                include('includes/dbh.inc.php');

                //On récupère les images des produits du catalogue
                $dir = 'images_catalogue';


                //On récupère les enregistrements de la base de données
                $req_main = $conn->prepare("SELECT MATERIEL.NOM, MATERIEL.FILE_NAME, MATERIEL.DESCRIPTION FROM MATERIEL");
                $req_main->execute();


                //On crée une boucle pour afficher les photos avec description
                while($row = $req_main->fetch()){
                    $file_name = $row['FILE_NAME'];
                    $description = $row['DESCRIPTION'];

                    //On affiche le résultat
                    echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="'.$dir.'/'.$file_name.'" width="150px" height="113px"></td>
                                <td>'.$description.'</td>
                            <tr>
                          </table>';
                }

            ?>
        </div>
    </section>


</main>

<?php
    require 'footer.php';
?>