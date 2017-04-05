<?php
class Logger
{
    public function logMessage($message)
    {
        $this->saveLog($message);
    }
}
