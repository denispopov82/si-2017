<?php
class User
{
    public $username;
    public $email;
    public $password;
    
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function showInfo()
    {
        printf('Username: %s<br />Email: %s<br />Password: %s<br />', $this->username, $this->email, $this->password);
    }
}

$user = new User('John', 'john@gmail.com', 12345);
$user->showInfo();
echo '<br />';
echo '<br />';

//$user2 = clone $user;
$user2 = $user;
$user2->username = 'Mike';
$user2->email = 'mike@gmail.com';
$user2->password = 212345;
$user2->showInfo();
echo '<br />';
echo '<br />';

$user->showInfo();
echo '<br />';
echo '<br />';
