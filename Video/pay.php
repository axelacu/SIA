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



$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        $ids['id'], $ids['secret']
    )
);


$basket = Panier::fake();
$payment = \PayPal\Api\Payment::get($_POST['paymentID'],$apiContext);
var_dump($payment);


$execution= new \PayPal\Api\PaymentExecution();
$execution->setPayerId($_POST['payerID']);
$execution->setTransactions($payment->getTransactions());

try{
    $payment->execute($execution,$apiContext);
    echo $payment;
}catch(\PayPal\Exception\PayPalConnectionException $e){
    var_dump(json_decode($e->getData()));
}