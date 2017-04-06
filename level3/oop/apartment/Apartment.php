<?php
abstract class Apartment
{
    const ROOMS_NUMBER = 0;
    
    /**
     * @var int
     */
    private $width;
    
    /**
     * @var int
     */
    private $height;
    
    /**
     * @var int
     */
    protected $rooms;
    
    /**
     * @var int
     */
    protected static $balconies = 0;
    
    /**
     * @var int
     */
     protected static $loggias = 0;
    
    
    public function __construct()
    {
        $this->setRooms(static::ROOMS_NUMBER);
    }
    
    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }
    
    /**
     * @param int $width
     *
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
    
    /**
     * @param int $height
     *
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getRooms()
    {
        return $this->rooms;
    }
    
    /**
     * @param int $rooms
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }
    
    public function hasBalcony()
    {
        return static::$balconies > 0;
    }
    
    public function hasLoggias()
    {
        return static::$loggias > 0;
    }
    
//    abstract public function defineRoomsNumber();
}
