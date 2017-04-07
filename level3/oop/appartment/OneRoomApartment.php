<?php
require_once 'Apartment.php';

class OneRoomApartment extends Apartment
{
    const ROOMS_AMOUNT = 1;
    
    protected function defineSquare()
    {
        $this->setSquare(32);
    }
}
