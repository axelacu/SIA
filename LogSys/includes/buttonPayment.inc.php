<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-17
 * Time: 02:25
 */


require 'dbh.inc.php';
$req='SELECT Dev.ID_DEV,D.QUANTITE, I.lABEL, I.PRIX, C.DATE_START, C.DATE_END, C.DATE_VALIDATION, E.EMPLOYEE_NAME, E.EMPLOYEE_LAST_NAME   FROM COMMAND C, DEMAND D, DEVIS Dev,OFFRE I,EMPLOYEE E WHERE DEV.ID_EMPLOYEE = E.ID_EMPLOYEE AND I.ID_OFFRE = D.ID_OFFRE AND Dev.ID_DEVIS = C.ID_DEVIS AND D.ID_USER='.$_SESSION['USER_ID'].' AND C.VALIDATE_COMMAND = 1 AND C.PAYMENT = 0 AND D.ID_DEMAND = C.ID_DEMAND;';
$result = mysqli_query($conn,$req);



if(mysqli_num_rows($result) != 0) {
    echo'
    <div class="w3-container">
                        <div class="w3-right">
                            <button class="button" id="paypal-button" style="color: white; width:200px; background: black; margin-top: 10px ;"  >Payer</button>
                            <script>
                                paypal.Button.render({
                                    env: \'sandbox\',
                                    commit: true,
                                    payment : function () {
                                        return paypal.request.post(\'../Video/payment.php\').then(function (data) {
                                            return data.id;
                                        });

                                    },
                                    onAuthorize: function (data, actions) {
                                        return paypal.request.post(\'../Video/pay.php\', {
                                            paymentID: data.paymentID,
                                            payerID: data.payerID
                                        }).then(function (data) {
                                            document.location.href="http://localhost:8888/SIA/LogSys/commands_client.php";
                                        }).catch(function (err) {
                                            console.log(\'erreur\', err);
                                        })

                                    }
                                }, \'#paypal-button\');
                            </script>
                        </div>
                    </div>
         <div class="w3-container" >
            <div class="w3-right">
            
            
            <form class="w3-bar-item" action="includes/generate_textFile?numproduit='.mysqli_num_rows($result).'" method="post" >
                  <button type="submit" class="button"  style="color: white; width:200px; background: black; margin-top: 10px ;"  >Voir mon devis</button>
            </form> 

            </div>
        </div>
    ';
} else {

}
