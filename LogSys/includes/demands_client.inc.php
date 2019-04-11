<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 11/04/2019
 * Time: 11:10
 */

require 'dbh.inc.php';

$req ='SELECT * FROM COMMANDE WHERE ID_USER = '.$_SESSION['USER_ID'];

$result = mysqli_query($conn, $req);
if($result) {
    while ($donnees = mysqli_fetch_row($result)) {
        echo '
                    <tr>
                        <td style="width: 200px">'.$donnees[0].'</td>
                        <td style="width: 600px">' . $donnees[1]. '</td>
                        <td style="text-align: center">' . $donnees[5] . '</td>
                        <td style="text-align: center">' . $donnees[6] . '</td>
                        <td style="text-align: center">' . $donnees[7] . '</td>
                        <td style="text-align: center"><button class="button" style="color: #3a768f; float: left; ">PAY</button></td>
                    </tr>
        ';

    }
}