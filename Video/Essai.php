<?php

require 'Product.php';
require 'Panier.php';
$product=new Product();
$product->setPrice("40");
$product->setName("product1");

$panier = new Panier();
$panier->setProducts($product);
$vrai= $panier->getProducts();

echo $product->getName();
echo $vrai->getName();

$panier=Panier::fake();
echo $panier->getProducts()[1]->getName();