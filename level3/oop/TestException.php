<?php

class InvalidEmailException extends Exception {}

class EmptyUsernameException extends Exception {}

class User
{
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $email;
    
    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    private function checkUserInfo()
    {
        if (empty($this->username)) {
            throw new EmptyUsernameException('Usernme is empty!');
        }
        if (empty($this->email)) {
            throw new InvalidEmailException('Email is empty!');
        }
        
        return true;
    }
    
    public function getInfo()
    {
        try {
            $this->checkUserInfo();
        } catch (EmptyUsernameException $e) {
            echo $e->getMessage();
        } catch (InvalidEmailException $e) {
            echo $e->getMessage();
        }
    }
}

$user = new User();
$user->getInfo();
