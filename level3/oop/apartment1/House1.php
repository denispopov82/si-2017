<?php
require_once 'IBalcony.php';
require_once 'ILoggia.php';
require_once 'OneRoomApartment.php';
require_once 'TwoRoomApartment.php';
require_once 'ThreeRoomApartment.php';
require_once 'Storey.php';

class House1
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
                new OneRoomApartment1(),
                new OneRoomApartment1(),
                new OneRoomApartment1(),
                new TwoRoomApartment1(),
                new TwoRoomApartment1(),
                new ThreeRoomApartment1(),
                new ThreeRoomApartment1()
            ];
            $storey = new Storey1($apartments);
            $this->setStoreys($storeyNumber, $storey);
        }
    }
}

$house = new House1(9);
$house->build();
//echo "<pre>";
//    var_dump($house);
//echo "</pre>";
