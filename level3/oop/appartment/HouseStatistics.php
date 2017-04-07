<?php

class HouseStatistics
{
    /**
     * @var House
     */
    private $house;
    
    /**
     * @var array
     */
    private $apartmentsAmount = [];
    
    private $apartmentsSquare = [];
    
    /**
     * @param House $house
     */
    public function setHouse($house)
    {
        $this->house = $house;
    }
    
    public function getStoreysAmout()
    {
        return count($this->house->getStoreys());
    }
    
    public function getAllApartmentsAmout()
    {
        return array_sum($this->apartmentsAmount);
        
//        $storeys = $this->house->getStoreys();
//        $apartmentsAmount = array_map(
//            function (Storey $storey) {
//                return count($storey->getApartments());
//            },
//            $storeys
//        );
//        $apartmentsAmount = array_sum($apartmentsAmount);
//
//        return $apartmentsAmount;
    }
    
    public function collectRoomsApartmentAmount()
    {
        $storeys = $this->house->getStoreys();
        foreach ($storeys as $storey) {
            /** @var Storey $storey */
            $apartments = $storey->getApartments();
            foreach ($apartments as $apartment) {
                /** @var Apartment $apartment */
                $roomsAmount = $apartment->getRoomsAmount();
                if (!isset($this->apartmentsAmount[$roomsAmount])) {
                    $this->apartmentsAmount[$roomsAmount] = 0;
                }
                $this->apartmentsAmount[$roomsAmount]++;
            }
        }
    }
    
    public function getOneRoomApartmentsAmout()
    {
        return $this->apartmentsAmount[OneRoomApartment::ROOMS_AMOUNT];
        
//        $oneRoomsAmount = 0;
//        $storeys = $this->house->getStoreys();
//        foreach ($storeys as $storey) {
//            /** @var Storey $storey */
//            $apartments = $storey->getApartments();
//            foreach ($apartments as $apartment) {
//                if ($apartment instanceof OneRoomApartment) {
//                    $oneRoomsAmount++;
//                }
//            }
//        }
//
//        return $oneRoomsAmount;
    }
    
    public function getTwoRoomApartmentsAmout()
    {
        return $this->apartmentsAmount[TwoRoomApartment::ROOMS_AMOUNT];
        
//        $storeys = $this->house->getStoreys();
//        $apartmentsAmount = array_map(
//            function (Storey $storey) {
//                $oneRoomsAmount = array_map(
//                    function (Apartment $apartment) {
//                        if ($apartment instanceof TwoRoomApartment) {
//                            return 1;
//                        }
//
//                        return 0;
//                    },
//                    $storey->getApartments()
//                );
//
//                return array_sum($oneRoomsAmount);
//            },
//            $storeys
//        );
//
//        return array_sum($apartmentsAmount);
    }
    
    public function getThreeRoomApartmentsAmout()
    {
        return $this->apartmentsAmount[ThreeRoomApartment::ROOMS_AMOUNT];
        
//        $storeys = $this->house->getStoreys();
//        $apartmentsAmount = array_map(
//            function (Storey $storey) {
//                $oneRoomsAmount = array_map(
//                    function (Apartment $apartment) {
//                        if ($apartment instanceof ThreeRoomApartment) {
//                            return 1;
//                        }
//
//                        return 0;
//                    },
//                    $storey->getApartments()
//                );
//
//                return array_sum($oneRoomsAmount);
//            },
//            $storeys
//        );
//
//        return array_sum($apartmentsAmount);
    }
    
    public function collectApartmentSquare()
    {
        $storeys = $this->house->getStoreys();
        foreach ($storeys as $storey) {
            /** @var Storey $storey */
            $apartments = $storey->getApartments();
            foreach ($apartments as $apartment) {
                /** @var Apartment $apartment */
                $roomsAmount = $apartment->getRoomsAmount();
                $apartmentSquare = $apartment->getSquare();
                if (!isset($this->apartmentsSquare[$roomsAmount])) {
                    $this->apartmentsSquare[$roomsAmount] = [];
                }
                $this->apartmentsSquare[$roomsAmount][] = $apartmentSquare;
            }
        }
    }
    
    public function getAllApartmentsSquare()
    {
        $square = 0;
        foreach ($this->apartmentsSquare as $storey) {
            $square += array_sum($storey);
        }
        
        return $square;
    }
    
    public function getRoomApartmentsSquare($apartment, $signle = false)
    {
        if ($signle) {
            return array_shift($this->apartmentsSquare[$apartment]);
        }
        
        return array_sum($this->apartmentsSquare[$apartment]);
    }
}
