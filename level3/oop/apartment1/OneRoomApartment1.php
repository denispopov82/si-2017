<?php
require_once 'Apartment.php';

class OneRoomApartment1 extends Apartment1
{
    const ROOMS_AMOUNT = 1;
    
    protected function defineSquare()
    {
        $this->setSquare(32);
    }
}
