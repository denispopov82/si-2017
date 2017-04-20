<?php

class ProductS
{
    private $price;
    private $_logger;

    public function __construct(Logger $logger)
    {
        $this->_logger = $logger;
    }

    public function setPrice($price)
    {
        try {
            $this->price = $price;
            // save price in db
        } catch (Exception $e) {
            $this->_logger->logMessage($e->getMessage());
        }
    }
}
