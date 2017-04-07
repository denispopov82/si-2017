<?php
require_once 'IBalcony.php';
require_once 'ILoggia.php';
require_once 'OneRoomApartment.php';
require_once 'TwoRoomApartment.php';
require_once 'ThreeRoomApartment.php';
require_once 'Storey.php';

class House
{
    /**
     * @var int
     */
    private $storeysNumber = 0;
    
    /**
     * @var array
     */
    private $storeys = [];
    
    public function __construct($storeysNumber)
    {
        $this->storeysNumber = $storeysNumber;
    }
    
    private function setStoreys($storeyNumber, $storey)
    {
        $this->storeys[$storeyNumber] = $storey;
    }
    
    public function getStoreys()
    {
        return $this->storeys;
    }
    
    public function build()
    {
        for ($storeyNumber = 1; $storeyNumber <= $this->storeysNumber; $storeyNumber++) {
            $apartments = [
                new OneRoomApartment(),
                new OneRoomApartment(),
                new OneRoomApartment(),
                new TwoRoomApartment(),
                new TwoRoomApartment(),
                new ThreeRoomApartment(),
                new ThreeRoomApartment()
            ];
            $storey = new Storey($apartments);
            $this->setStoreys($storeyNumber, $storey);
        }
    }
}

$house = new House(9);
$house->build();
//echo "<pre>";
//    var_dump($house);
//echo "</pre>";
