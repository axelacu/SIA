<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-04
 * Time: 15:55
 */

require 'vendor/autoload.php';
$ids= require 'paypal.php';
require 'Product.php';
require 'Panier.php';
require '../LogSys/includes/dbh.inc.php';

session_start();

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        $ids['id'], $ids['secret']
    )
);


$basket = $_SESSION['basketPaypal'];
$payment = \PayPal\Api\Payment::get($_POST['paymentID'],$apiContext);
var_dump($payment);


$execution= new \PayPal\Api\PaymentExecution();
$execution->setPayerId($_POST['payerID']);
$execution->setTransactions($payment->getTransactions());

try{
    $payment->execute($execution,$apiContext);
    $req="UPDATE COMMAND C, DEMAND D SET C.PAYMENT=1 WHERE C.ID_DEMAND=D.ID_DEMAND AND D.ID_USER=".$_SESSION['USER_ID'].";";
    $result = mysqli_query($conn, $req);
    echo $payment;


}catch(\PayPal\Exception\PayPalConnectionException $e){
    var_dump(json_decode($e->getData()));
}