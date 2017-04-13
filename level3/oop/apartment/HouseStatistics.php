<?php
include_once 'House.php';

class HouseStatistics
{
    /**
     * @var House $house
     */
    private $house;
    
    private $apartments = [];
    
    private $balconies = [];
    
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
    
    private function collectBalconies()
    {
        if (empty($this->apartments)) {
            $this->collectApartments();
        }
        
        foreach ($this->apartments as $roomsNumber => $apartments) {
            $apartmentsCount = count($apartments);
            /**
             * @var $apartment Apartment
             */
            $apartment = array_shift($apartments);
            $balconiesAmount = $apartment->getBalconies();
            $this->balconies[$apartment->getRoomsAmount()] = $balconiesAmount * $apartmentsCount;
        }
    }
    
    public function getBalconiesAmount()
    {
        if (empty($this->balconies)) {
            $this->collectBalconies();
        }
        
        $balconiesAmount = array_sum($this->balconies);
        
        return $balconiesAmount;
    }
    
    public function getOneRoomBalconiesAmountTotal()
    {
        if (empty($this->balconies)) {
            $this->collectBalconies();
        }
    
        return $this->balconies[OneRoomApartment::ROOMS_AMOUT];
    }
    
    public function getOneRoomBalconiesSingleAmount()
    {
        /**
         * @var $apartment Apartment
         */
        $apartment = array_shift($this->apartments[OneRoomApartment::ROOMS_AMOUT]);
        if ($apartment->hasBalcony()) {
            return $apartment->getBalconies();
        }
        
        return 0;
    }
    
    public function getTwoRoomBalconiesAmountTotal()
    {
        if (empty($this->balconies)) {
            $this->collectBalconies();
        }
        
        return $this->balconies[TwoRoomApartment::ROOMS_AMOUT];
    }
    
    public function getTwoRoomBalconiesSingleAmount()
    {
        /**
         * @var $apartment Apartment
         */
        $apartment = array_shift($this->apartments[TwoRoomApartment::ROOMS_AMOUT]);
        if ($apartment->hasBalcony()) {
            return $apartment->getBalconies();
        }
        
        return 0;
    }
    
    public function getTheeRoomBalconiesAmountTotal()
    {
        if (empty($this->balconies)) {
            $this->collectBalconies();
        }
        
        return $this->balconies[ThreeRoomApartment::ROOMS_AMOUT];
    }
    
    public function getThreeRoomBalconiesSingleAmount()
    {
        /**
         * @var $apartment Apartment
         */
        $apartment = array_shift($this->apartments[ThreeRoomApartment::ROOMS_AMOUT]);
        if ($apartment->hasBalcony()) {
            return $apartment->getBalconies();
        }
        
        return 0;
    }
}












