<?php
/**
 * ${CLASS_NAME}
 *
 * @package   ${PARAM_DOC}
 */
class Singleton
{
    private static $link;
    
    private function __construct()
    {
    }
    
    private function __sleep()
    {
    }
    
    private function __wakeup()
    {
    }
    
    private function __clone()
    {
    }
    
    public static function getInstance()
    {
        if (self::$link === null) {
            self::$link = new Singleton();
        }
        
        return self::$link;
    }
}

$sigleton1 = Singleton::getInstance();
$sigleton2 = Singleton::getInstance();
echo "<pre>";
    var_dump($sigleton1);
echo "</pre>";
echo "<pre>";
    var_dump($sigleton2);
echo "</pre>";
