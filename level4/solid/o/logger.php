<?php

/**
 * FileLogger
 * Переделана имплементация логирования с использованием абстрактного класса LoggerAbstract.
 * Класс хранит абстрактный метод saveLog.
 * Каждый класс по логированию должен реализовать этот метод по своему.
 * Теперь мы можем создать два класса для логирования в файл и в базу данных. Каждый класс реализует абстрактный метод
 * по своему.
 */
abstract class LoggerAbstract
{
    public function logMessage($message)
    {
        $this->saveLog($message);
    }
    
    abstract public function saveLog($message);
}

class FileLogger extends LoggerAbstract
{
    public function saveLog($message)
    {
        // save log to file
    }
}

class DBLogger extends LoggerAbstract
{
    public function saveLog($message)
    {
        // save log to database
    }
}
