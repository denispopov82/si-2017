<?php
class User
{
    public $name = 'John';
    
    public static $email;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
}

$user = new User('John');
$stringObj = serialize($user);
$objectFromString = unserialize($stringObj);



echo "<pre>";
    var_dump(get_class($user));
echo "</pre>";
