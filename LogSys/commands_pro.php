<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 12/04/2019
 * Time: 14:17
 */
require 'header.php';
?>

    <main>
        <section>
            <div id="commands">
                <section class="blanc" id="demand">
                    <div class="inscription">
                        <h1>DEMANDES DES CLIENTS</h1>
                    </div>
                    <div class="w3-container">
                        <h3>nom client_1</h3>
                        <table class="w3-table w3-bordered">
                            <tr>
                                <th><label> <b>Reference</b></label></th>
                                <th style="width: 40%"><label> <b>Description</b></label></th>
                                <th style="text-align: center"><label> <b>Date de Debut</b></label></th>
                                <th style="text-align: center"><label> <b>date de fin</b></label></th>
                                <th style="text-align: center"><label> <b>Action</b></label></th>
                            </tr>
                            <tr>
                                <td style="width: 200px">'.$donnees[0].'</td>
                                <td style="width: 600px">' . $donnees[1]. '</td>
                                <td style="text-align: center">' . $donnees[5] . '</td>
                                <td style="text-align: center">' . $donnees[6] . '</td>
                                <td style="text-align: center"><button class="button" style="color: white; float: left; background: black ">Valider</button></td>
                            </tr>
                        </table>
                        <h3>nom client_2</h3>
                        <table class="w3-table w3-bordered">
                            <tr>
                                <th><label> <b>Reference</b></label></th>
                                <th style="width: 40%"><label> <b>Description</b></label></th>
                                <th style="text-align: center"><label> <b>Date de Debut</b></label></th>
                                <th style="text-align: center"><label> <b>date de fin</b></label></th>
                                <th style="text-align: center"><label> <b>Action</b></label></th>
                            </tr>
                        </table>

                    </div>
                </section>
            </div>


        </section>
    </main>

<?php
require 'footer.php';
?>