<?php
/**
 * SOLID
 * I - Принцип разделения интерфейса
 * Interface segregation principle
 * Клиенты не должны зависеть от методов, которые они не используют
 */
class SuperTransformer1 implements ISuperTransformer
{
    public function toCar()
    {
        echo 'Transform to car';
    }
    
    public function toPlane()
    {
        echo 'Transform to plane';
    }
    
    public function toShip()
    {
        echo 'Transform to ship';
    }
}

/**
 * В классах ниже имплементируется интерфейс ISuperTransformer, который обязывает реализовать все три метода.
 * Проблема заключается в том, что методы, которые мы не используем, мы обязаны их как-то реализовать.
 */

class CarTransformer1 implements ISuperTransformer
{
    public function toCar()
    {
        echo 'Transform to car';
    }
    
    public function toPlane()
    {
        // method is not needed
        throw new Exception('I can\t transform to plane');
    }
    
    public function toShip()
    {
        // method is not needed
        throw new Exception('I can\t transform to ship');
    }
}

class PlaneTransformer1 implements ISuperTransformer
{
    public function toCar()
    {
        // method is not needed
        throw new Exception('I can\t transform to car');
    }
    
    public function toPlane()
    {
        echo 'Transform to plane';
    }
    
    public function toShip()
    {
        // method is not needed
        throw new Exception('I can\t transform to ship');
    }
}

class ShipTransformer1 implements ISuperTransformer
{
    public function toCar()
    {
        // method is not needed
        throw new Exception('I can\t transform to car');
    }
    
    public function toPlane()
    {
        // method is not needed
        throw new Exception('I can\t transform to plane');
    }
    
    public function toShip()
    {
        echo 'Transform to ship';
    }
}
