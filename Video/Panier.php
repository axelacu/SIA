<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-04
 * Time: 12:25
 */

class Panier
{

    private $products;


    public function getProducts(){
        return $this->products;
    }

    public function setProducts($products){
        $this->products=$products;
    }

    public function addProduct(Product $product){
        $this->products[]=$product;
        return $this;
    }

    public function getPrice(): float { return array_reduce($this->getProducts(),
        function ($total,Product $product){
            return $product->getprice()*$product->getQuantity()+$total;
        },0);

    }

    public function getVatPrice($rate):float {
        return round($this->getPrice()*$rate*100)/100;
    }


    public static function fake(): Panier{
        $product = new Product();
        $product->setPrice(1.21);
        $product->setName('Produit1');
        $productsfake[0]=$product;
        $product = new Product();
        $product->setPrice(23);
        $product->setName('Produit2');
        $productsfake[1]=$product;
        $product = new Product();
        $product->setPrice(56);
        $product->setName('Produit3');
        $productsfake[2]=$product;

        $return = new Panier();
        $return->setProducts($productsfake);

        return $return;
    }


}