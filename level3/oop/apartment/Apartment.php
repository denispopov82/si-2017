<?php

abstract class Apartment implements IBalcony, ILoggia
{
    const ROOMS_AMOUT = 0;
    
    protected static $balconies = 0;
    
    protected static $loggias = 0;
    
    public function getRoomsAmount()
    {
        return static::ROOMS_AMOUT;
    }
    
    public function hasBalcony()
    {
        return static::$balconies > 0;
    }
    
    public function getBalconies()
    {
        return static::$balconies;
    }
    
    public function hasLoggia()
    {
        return static::$loggias > 0;
    }
    
    public function getLoggias()
    {
        return static::$loggias;
    }
}
