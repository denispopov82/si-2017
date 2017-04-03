<?php
class BirdRun
{
    private $_bird;
    
    public function __construct(Bird $bird)
    {
        $this->_bird = $bird;
    }
    
    public function run()
    {
        $flySpeed = $this->_bird->fly(); // expects int
    }
}
