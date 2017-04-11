<?php
require_once 'Apartment.php';

class TwoRoomApartment1 extends Apartment1
{
    const ROOMS_AMOUNT = 2;
    
    protected static $balcony = 1;
    
    protected function defineSquare()
    {
        $this->setSquare(62);
    }
}
