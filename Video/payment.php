<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-03
 * Time: 19:24
 */
require 'vendor/autoload.php';
require 'Product.php';
require 'Panier.php';
session_start();

$ids= require('paypal.php');
$basket = $_SESSION['basketPaypal'];

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        $ids['id'], $ids['secret']
    )
);



$list = new \PayPal\Api\ItemList();

foreach ($basket->getProducts() as $product){
    $item=new \PayPal\Api\Item();
    $item->setName($product->getName());
    $item->setPrice($product->getPrice());
    $item->setCurrency('EUR');
    $item->setQuantity($product->getQuantity());
    $list->addItem($item);
}

$details = new \PayPal\Api\Details();
$amount = new \PayPal\Api\Amount();
$amount->setTotal($basket->getPrice());
$amount->setCurrency('EUR');
$amount->setDetails($details);

$transaction = new \PayPal\Api\Transaction();
$transaction->setItemList($list);
$transaction->setDescription('Achat sur le site Airblio');
$transaction->setAmount($amount);
$transaction->setCustom('demo1');

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale');
$redirectUrls=new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl('http://localhost:8888/SIA/Video/pay.php');
$redirectUrls->setCancelUrl('http://localhost:8888/index.php');
$payment->setRedirectUrls($redirectUrls);

$payment->setPayer((new \PayPal\Api\Payer())->setPaymentMethod('paypal'));

$payment->setTransactions([$transaction]);




try {
    $payment->create($apiContext);
   echo json_encode([
       'id'=> $payment->getId()
   ]);
   exit;

}catch(\PayPal\Exception\PayPalConnectionException $e){
    echo(var_dump(json_decode($e->getData())));
}

