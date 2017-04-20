<?php


class Product1
{
    private $_logger;
    
    public function __construct(LoggerAbstract $logger)
    {
        $this->_logger = $logger;
    }
    
    public function setPrice($price)
    {
        try {
            // save price in db
        } catch (Exception $e) {
            $this->_logger->logMessage($e->getMessage());
        }
    }
}
