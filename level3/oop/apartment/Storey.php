<?php

class Storey
{
    /**
     * @var array
     */
    private $apartments = [];
    
    public function __construct($apartments)
    {
        $this->setApartments($apartments);
    }
    
    /**
     * @return array
     */
    public function getApartments()
    {
        return $this->apartments;
    }
    
    /**
     * @param array $apartments
     */
    private function setApartments($apartments)
    {
        $this->apartments = $apartments;
    }
}
