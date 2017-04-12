<?php
include_once 'IBalcony.php';
include_once 'ILoggia.php';
include_once 'ICloset.php';
include_once 'Apartment.php';
include_once 'OneRoomApartment.php';
include_once 'TwoRoomApartment.php';
include_once 'ThreeRoomApartment.php';
include_once 'Storey.php';

class House
{
    private $storeyNumber;
    
    private $storeys = [];
    
    public function __construct($storeyNumber)
    {
        $this->storeyNumber = $storeyNumber;
    }
    
    /**
     * @param Storey $storey
     */
    private function setStorey($storeyNumber, Storey $storey)
    {
        $this->storeys[$storeyNumber] = $storey;
    }
    
    public function getStoreys()
    {
        return $this->storeys;
    }
    
    public function build()
    {
        for ($storeyIndex = 1; $storeyIndex <= $this->storeyNumber; $storeyIndex++) {
            $apartments = [
                new OneRoomApartment(),
                new OneRoomApartment(),
                new TwoRoomApartment(),
                new TwoRoomApartment(),
                new ThreeRoomApartment()
            ];
            $storey = new Storey($apartments);
            $this->setStorey($storeyIndex, $storey);
        }
    }
}
