<?php

class ProductIncorrect
{
    private $price;
    
    public function setPrice($price)
    {
        try {
            $this->price = $price;
            // save price in db
        } catch (Exception $e) {
            $this->logError($e->getMessage());
        }
    }

    public function logError($error)
    {
        // save error message
    }
}
