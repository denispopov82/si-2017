<?php

class ThreeRoomApartment extends Apartment implements ICloset
{
    const ROOMS_AMOUT = 3;
    
    protected static $balconies = 1;
    
    protected static $loggias = 1;
    
    public function hasCloset()
    {
        // TODO: Implement hasCloset() method.
    }
}
