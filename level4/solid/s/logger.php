<?php

class Logger
{
    private function saveToFile($message)
    {
        // save log to file
    }
    
    public function logMessage($message)
    {
        $this->saveToFile($message);
    }
}
