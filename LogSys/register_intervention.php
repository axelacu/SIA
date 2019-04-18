<?php
/**
 * Created by PhpStorm.
 * User: houzetorlane
 * Date: 2019-04-17
 * Time: 22:18
 */

require 'header.php';
require 'includes/dbh.inc.php';

?>

<main>

    <section>
        <div id="commands">
            <section class="blanc" id="demand">
                <div class="inscription">
                    <h1>Register intervention</h1>
                </div>
                <div class="w3-container">
                    <table class="w3-table w3-bordered">
                        <tr>
                            <th><label> <b>Id command</b></label></th>
                            <th><label> <b>Label of demand</b></label></th>
                            <th><label> <b>Date validation</b></label></th>
                            <th style="text-align: center"><label> <b>Start date</b></label></th>
                            <th style="text-align: center"><label> <b>End date</b></label></th>
                            <th style="text-align: left"><label> <b>Equipe</b></label></th>
                        </tr>


                        <?php

                        $req = "SELECT DISTINCT C.id_command, C.date_validation, C.date_start, C.date_end, O.label FROM COMMAND C, DEMAND D, OFFRE O WHERE C.id_demand=D.id_demand AND D.id_offre=O.id_offre";
                        $result = mysqli_query($conn,$req);

                        if($result) {
                            while ($donnees = mysqli_fetch_row($result)) {
                                echo '
                                    <tr>
                                        <td>'. $donnees[0] .'</td>
                                        <td style="text-align: left">' . $donnees[4] . '</td>
                                        <td style="text-align: center">' . $donnees[1] . '</td>
                                        <td style="text-align: center">' . $donnees[2] . '</td>
                                        <td style="text-align: center">' . $donnees[3] . '</td>
                                        <td style="text-align: right">
                                        
                                            <form action="includes/register_intervention.inc.php?register=true&id=' . $donnees[0] .'" method="post" enctype="multipart/form-data" style="display: flex;">
                                                <select name="equipe">';
                                                    include('includes/equipes.inc.php');
                                            echo'
                                                </select>
                                                <button type="submit" id="register" class="button w3-button" style="color: white; width: 50%; background: black; margin-left: 10px">Register</button>
                                            </form>
                                        </td>
                                    </tr>';
                            }
                        }
                        $conn->close();
                        ?>
                    </table>
                </div>
            </section>
        </div>
    </section>
</main>


<?php
require 'footer.php';
?>
