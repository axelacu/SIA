<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-04
 * Time: 12:26
 */

class Product
{
    private $name;
    private $price;
    private $quantity;


    public function getName(){
        return $this->name;
    }


    public function setName($name){
        $this->name=$name;
    }

    public function getprice(){
        return $this->price;
    }


    public function setPrice($price){
        $this->price=$price*$this->quantity;
    }

    public function getQuantity() {
        return $this->quantity;
    }


    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }


}