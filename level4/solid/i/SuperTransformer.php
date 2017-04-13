<?php

/**
 * Задача решается разделением одного интерфейса на три нескольких.
 * В SuperTransformer мы применяем все три интерфейса.
 */
class SuperTransformer implements ICarTransformer, IPlaneTransformer, IShipTransformer
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
 * А в классы ниже мы применяем только те интерфейсы, методы которых мы будем реализовывать.
 */

class CarTransformer implements ICarTransformer
{
    public function toCar()
    {
        echo 'Transform to car';
    }
}

class PlaneTransformer implements IPlaneTransformer
{
    public function toPlane()
    {
        echo 'Transform to plane';
    }
}

class ShipTransformer implements IShipTransformer
{
    public function toShip()
    {
        echo 'Transform to ship';
    }
}
