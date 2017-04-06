<?php
class Product
{
    public $name = 'product';
    
    protected $price = 10;
    
    private $weight = 300;
    
    public function getName()
    {
        return $this->name;
    }
    
    protected function getWeight()
    {
        return $this->weight;
    }
}

class Car extends Product
{
    public function getName()
    {
        $this->name = 'car';
        
        return $this->name;
    }
}

class Toyota extends Car
{
    public function getName()
    {
        $this->name = 'toyota';
        
        return $this->name;
    }
}

class Food
{
    public function getName()
    {
        return __CLASS__;
    }
}

$product = new Product();
$car = new Car();
$toyota = new Toyota();
$food = new Food();

$array = [$product, $car, $toyota, $food];
foreach ($array as $item) {
//    echo $item->getName() . '<br />';
}


class Human
{
    public $name;
    public $yearOfBorn;
    public $age;
    public $weight;
    public $frieds;
    
    public function __construct($name, $year, $age1111)
    {
        $this->name            = $name;
        $this->yearOfBorn  = $year;
        $this->age = $age1111;
    }
}
$person = new Human("Kate Ross", 1997, 30);
foreach ($person as $entity => $value) {
    echo $entity . " : " . $value . "<br />";
}
