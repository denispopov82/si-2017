<?php
require_once 'Apartment.php';

class ThreeRoomApartment1 extends Apartment1
{
    const ROOMS_AMOUNT = 3;
    
    protected static $balcony = 1;
    
    protected static $loggia = 1;
    
    protected function defineSquare()
    {
        $this->setSquare(92);
    }
}
