<?php
abstract class B
{
    public function sayHello()
    {
        echo 'Hello abstract ';
    }
}

trait C
{
    public function sayHello()
    {
        parent::sayHello();
        echo 'Hello trait';
    }
}

class A extends B
{
    use C;
    
    public function sayHello()
    {
        parent::sayHello();
        echo 'Hello A';
    }
}

$a = new A();
$a ->sayHello();
