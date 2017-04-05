<?php
/**
 * SOLID
 * I - Принцип разделения интерфейса
 * Interface segregation principle
 */
class SuperTransformer implements ITransformer
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
