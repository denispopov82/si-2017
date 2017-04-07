<?php

class Storey
{
    /**
     * @var array
     */
    private $apartments = [];
    
    /**
     * Storey constructor.
     *
     * @param array $apartments
     */
    public function __construct(array $apartments)
    {
        $this->apartments = $apartments;
    }
    
    /**
     * @return array
     */
    public function getApartments()
    {
        return $this->apartments;
    }
}
