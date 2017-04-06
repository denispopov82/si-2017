<?php
abstract class AbstractAnimal
{
    public $age;
    public $weight;
    public $sleep = false;
    public $voiceAge;
    
    public function getVoice()
    {
        if (!$this->sleep && $this->age > $this->voiceAge) {
            $this->voiceProcess();
        }
    }
    
    abstract protected function voiceProcess();
}

class Dog extends AbstractAnimal
{
    public function __construct()
    {
        $this->voiceAge = 2;
    }
    
    private function woof()
    {
        echo 'Woof!';
    }
    
    public function voiceProcess()
    {
        $this->woof();
    }
}

class Cat extends AbstractAnimal
{
    public function __construct()
    {
        $this->voiceAge = 1;
    }
    
    private function meow()
    {
        echo 'Woof!';
    }
    
    public function voiceProcess()
    {
        $this->meow();
    }
}

interface ZooDweller
{

}

interface IAnimal
{
    public function getInventoryNumber();
}

class Lion extends AbstractAnimal implements ZooDweller, IAnimal
{
    private function roar()
    {
        echo 'Roar!';
    }
    
    protected function voiceProcess()
    {
        $this->roar();
    }
    
    public function getInventoryNumber()
    {
        return 10;
    }
}

class Zebra extends AbstractAnimal implements ZooDweller, IAnimal
{
    private function growl()
    {
        echo 'Growl!';
    }
    
    protected function voiceProcess()
    {
        $this->growl();
    }
    
    public function getInventoryNumber()
    {
        return 12;
    }
}

class Guard implements ZooDweller
{
}

class Zoo
{
    private $zooDweller = [];
    
    protected function addAnimal(IAnimal $animal)
    {
        $this->zooDweller[] = $animal;
    }
    
    public function inventory()
    {
        $zooDwellers = ['Dog', 'Cat', 'Lion', 'Zebra'];
        foreach ($zooDwellers as $zooDweller) {
            if ($zooDweller instanceof IAnimal) {
                $this->addAnimal($zooDweller);
            }
        }
    }
}


$zoo = new Zoo();
$zoo->inventory();
