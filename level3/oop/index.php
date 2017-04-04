<?php
class Car
{
    public $color;
    public $model;
    
}

$car = new Car();
$car->color = 'yellow';
$car->model = 'Ford';

class User
{
    public $username;
    public $email;
    public $password;
    
    public function showInfo()
    {
        printf('Username: %s<br />Email: %s<br />Password: %s', $this->username, $this->email, $this->password);
    }
}

$user = new User();
$user->username = 'John';
$user->email = 'john@gmail.com';
$user->password = 12345;
$user->showInfo();
echo '<br />';
echo '<br />';

$user->username = 'Mike';
$user->email = 'mike@gmail.com';
$user->password = 212345;
$user->showInfo();
echo '<br />';
echo '<br />';

$user->username = 'Kate';
$user->email = 'kate@gmail.com';
$user->password = 34345;
$user->showInfo();
echo '<br />';
echo '<hr />';

class User2
{
    public $username;
    public $email;
    public $password;
    
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    
        printf('Username: %s is created<br />', $this->username);
    }
    
    public function showInfo()
    {
        printf('Username: %s<br />Email: %s<br />Password: %s<br />', $this->username, $this->email, $this->password);
    }
    
    public function __destruct()
    {
        printf('Username: %s deleted<br/>', $this->username);
    }
}

$user = new User2('John', 'john@gmail.com', 12345);
$user->showInfo();
echo '<br />';
echo '<br />';

$user = new User2('Mike', 'mike@gmail.com', 212345);
$user->showInfo();
echo '<br />';
echo '<br />';

$user = new User2('Kate', 'kate@gmail.com', 34345);
$user->showInfo();
