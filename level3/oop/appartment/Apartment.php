<?php

abstract class Apartment implements IBalcony, ILoggia
{
    const ROOMS_AMOUNT = 0;
    
    protected static $balcony = 0;
    
    protected static $loggia = 0;
    
    protected $square;
    
    public function __construct()
    {
        $this->defineSquare();
    }
    
    public function getRoomsAmount()
    {
        return static::ROOMS_AMOUNT;
    }
    
    public static function hasBalcony()
    {
        return static::$balcony > 0;
    }
    
    public static function hasLoggia()
    {
        return static::$loggia > 0;
    }
    
    public static function getBalconiesAmount()
    {
        if (self::hasBalcony()) {
            return static::$balcony;
        }
        
        return false;
    }
    
    public static function getLoggiasAmount()
    {
        return static::$loggia;
    }
    
    protected function setSquare($square)
    {
        $this->square = $square;
    }
    
    public function getSquare()
    {
        return $this->square;
    }
    
    abstract protected function defineSquare();
}
