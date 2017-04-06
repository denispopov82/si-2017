<?php

class StaticExample
{
    static public $aNum = 0;
    
    /**
     * Статические методы, используемые в контексте класса
     */
    static public function sayHello()
    {
        echo 'Hello!';
    }
}

echo StaticExample::$aNum;
echo '<br>';
StaticExample::sayHello();
echo '<br>';
echo '<br>';

class StaticExample2
{
    static public $aNum = 0;
    
    /**
     * Статические методы, используемые в контексте класса
     */
    static public function sayHello()
    {
        self::$aNum++;
        
        echo 'Hello! (' . self::$aNum . ')';
    }
}

echo StaticExample::$aNum;
echo '<br>';
StaticExample2::sayHello();
echo '<br>';
