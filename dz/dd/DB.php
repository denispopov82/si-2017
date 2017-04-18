<?php
class DB
{
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = 'root';
    const DBNAME = 'mytest';

    private static $link = null;
    
    private function __construct()
    {
    }
    
    private function __clone()
    {
    }
    
    private function __wakeup()
    {
    }
    
    public static function getInstance()
    {
        if (self::$link === null) {
            self::$link = new mysqli(self::HOST, self::USERNAME, self::PASSWORD);
            if (!empty(self::$link->connect_error)) {
                die(self::$link->connect_error);
            }
            if (!self::$link->select_db(self::DBNAME)) {
                die(self::$link->error);
            }
            self::$link->query('SET NAMES utf8');
        }
        
        return self::$link;
    }
}

//// connec to DB
//$host = 'localhost';
//$username = 'root';
//$password = 'root';
//$dbname = 'personal1';
//
//$link = new mysqli($host, $username, $password);
//if (!empty($link->connect_error)) {
//    die($link->connect_error);
//}
//if (!$link->select_db($dbname)) {
//    die($link->error);
//}
//$link->query('SET NAMES utf8');
//
//$firstname = 'William';
//$lastname = "O'Genry";
//
//$firstname = $link->real_escape_string($firstname);
//$lastname = $link->real_escape_string($lastname);
//$query = "INSERT INTO user (`firstname`, `lastname`) VALUES ('$firstname', '$lastname')";
//$result = $link->query($query);
//if (!$result) {
//    die('User is not added ' . $link->error);
//}
//
//$query = "SELECT * FROM user";
//$result = $link->query($query);
//if (!$result) {
//    die('Users are not exist ' . $link->error);
//}
//
//while ($row = $result->fetch_assoc()) {
//    printf('Firstname: %s, Lastname: %s <br />', $row['firstname'], $row['lastname']);
//}
//
//$query = "UPDATE user SET lastname = 'Хичкок' WHERE firstname = 'John'";
//$result = $link->query($query);
//if (!$result) {
//    die('Users are not exist ' . $link->error);
//}
//printf('Number of affected rows is ' . $link->affected_rows);
//
//
//$query = "DELETE FROM user WHERE lastname = 'Хичкок'";
//$result = $link->query($query);
//if (!$result) {
//    die('Users are not exist ' . $link->error);
//}
//printf('Number of affected rows is ' . $link->affected_rows);
