<?php
include_once 'House.php';

class HouseStatistics
{
    /**
     * @var House $house
     */
    private $house;
    
    private $apartments = [];
    
    public function setHouse(House $house)
    {
        $this->house = $house;
    }
    
    public function getStoreysAmout()
    {
        $storeysCount = count($this->house->getStoreys());
        
        return $storeysCount;
    }
    
    public function getApartmentsAmount()
    {
        $storeys = $this->house->getStoreys();
        $storeysCount = count($storeys);
        
        $apartmentsCount = 0;
        for ($i = 1; $i <= $storeysCount; $i++) {
            /**
             * @var $storey Storey
             */
            $storey = $storeys[$i];
            $apartmentsCount += count($storey->getApartments());
        }
        
        return $apartmentsCount;
    }
    
    private function collectApartments()
    {
        $storeys = $this->house->getStoreys();
        /**
         * @var $storey Storey
         */
        foreach ($storeys as $storey) {
            $apartments = $storey->getApartments();
            /**
             * @var $apartment Apartment
             */
            foreach ($apartments as $apartment) {
                if ($apartment instanceof OneRoomApartment
                    || $apartment instanceof TwoRoomApartment
                    || $apartment instanceof ThreeRoomApartment
                ) {
                    $roomsAmount = $apartment->getRoomsAmount();
                    $this->apartments[$roomsAmount][] = $apartment;
                }
            }
        }
    }
    
    public function getOneRoomApartmentsAmount()
    {
        if (empty($this->apartments)) {
            $this->collectApartments();
        }

        $roomsCount = count($this->apartments[OneRoomApartment::ROOMS_AMOUT]);
        
        return $roomsCount;
    }
    
    public function getTwoRoomApartmentsAmount()
    {
        if (empty($this->apartments)) {
            $this->collectApartments();
        }
        
        $roomsCount = count($this->apartments[TwoRoomApartment::ROOMS_AMOUT]);
        
        return $roomsCount;
    }
    
    public function getThreeRoomApartmentsAmount()
    {
        if (empty($this->apartments)) {
            $this->collectApartments();
        }
        
        $roomsCount = count($this->apartments[ThreeRoomApartment::ROOMS_AMOUT]);
        
        return $roomsCount;
    }
}
