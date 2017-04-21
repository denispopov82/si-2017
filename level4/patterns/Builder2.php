<?php
class Vehicle
{
    private $parts = [];
    
    public function setParts(CarPart $part)
    {
        $this->parts[get_class($part)][] = $part;
    }
}

class CarPart
{}

class Wheel extends CarPart
{}

class Engine extends CarPart
{}

class Door extends CarPart
{}

interface BuilderInterface
{
    public function createVehicle();
    
    public function addWheels();
    
    public function addEngine();
    
    public function addDoors();
    
    public function getVehicle();
}

class TruckBuilder implements BuilderInterface
{
    /**
     * @var $vehicle \Vehicle
     */
    private $vehicle;
    
    public function createVehicle()
    {
        $this->vehicle = new Vehicle();
    }
    
    public function addWheels()
    {
        $this->vehicle->setParts(new Wheel());
        $this->vehicle->setParts(new Wheel());
        $this->vehicle->setParts(new Wheel());
        $this->vehicle->setParts(new Wheel());
    }
    
    public function addEngine()
    {
        $this->vehicle->setParts(new Engine());
    }
    
    public function addDoors()
    {
        $this->vehicle->setParts(new Door());
        $this->vehicle->setParts(new Door());
        $this->vehicle->setParts(new Door());
        $this->vehicle->setParts(new Door());
    }
    
    public function getVehicle()
    {
        return $this->vehicle;
    }
}

class Operator
{
    public function build(BuilderInterface $builder)
    {
        $builder->createVehicle();
        $builder->addWheels();
        $builder->addEngine();
        $builder->addDoors();
        $vehicle = $builder->getVehicle();
        
        return $vehicle;
    }
}

$operator = new Operator();
$vehicle = $operator->build(new TruckBuilder());
echo "<pre>";
    var_dump($vehicle);
echo "</pre>";
