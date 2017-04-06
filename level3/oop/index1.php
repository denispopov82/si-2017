<?php

class Human
{
    public $name;
    public $age = 0;
    
    public function __construct($username, $userage)
    {
        $this->name = $username;
        $this->age = $userage;
    
        printf('User name: %s is created <br />', $this->name);
    }
    
    public function showUserInfo()
    {
        printf('User name: %s, user age: %d', $this->name, $this->age);
    }
    
    public function __clone()
    {
        printf('User name: %s is cloned <br />', $this->name);
    }
    
    public function __destruct()
    {
        printf('User name: %s is deleted <br />', $this-userManager>name);
    }
}

$person1 = new Human('John', 25);
$person2 = clone $person1;

$person2->name = 'Mike';
$person2->age = 30;

////$person1->showUserInfo();
//
//echo '<br>';
//echo '<br>';
//
////$person2 = new Human('Mike', 30);
////$person2->showUserInfo();
//
//
//echo "<pre>";
//    var_dump($person1);
//echo "</pre>";
//echo "<pre>";
//    var_dump($person2);
//echo "</pre>";
