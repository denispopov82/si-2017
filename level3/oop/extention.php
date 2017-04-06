<?php

class Product
{
}

class Car extends Product
{
    public $name;
    public $color;
    public $model;
    public $price;
}

class Food extends Product
{
    public $name;
    public $unit;
    public $weight;
    public $price;
}

$entity = new Product();
$car = new Car();
$product = new Food();

var_dump($entity);
var_dump($car);
var_dump($product);
