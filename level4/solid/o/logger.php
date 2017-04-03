<?php
//class Logger_invalid
//{
//    private function saveToFile($message)
//    {
//        // ...
//    }
//
//    public function logMessage($message)
//    {
//        $this->saveToFile($message);
//    }
//}

class FileLogger implements ILogger
{
    private function saveToFile($message)
    {
        // ...
    }
    
    public function logMessage($message)
    {
        $this->saveToFile($message);
    }
}

class DBLogger implements ILogger
{
    private function saveToDb($message)
    {
        // ...
    }
    
    public function logMessage($message)
    {
        $this->saveToDb($message);
    }
}
