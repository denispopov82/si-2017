<?php
// connec to DB
$host = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'personal';

$link = mysqli_connect($host, $username, $password);
if (!$link) {
    die('Connection is lost ' . mysqli_connect_error());
}
mysqli_select_db($link, $dbname);

mysqli_query($link, 'SET NAMES utf8');

$firstname = 'William';
$lastname = "O'Genry";

$firstname = mysqli_real_escape_string($link, $firstname);
$lastname = mysqli_real_escape_string($link, $lastname);
$query = "INSERT INTO user (`firstname`, `lastname`) VALUES ('$firstname', '$lastname')";
$result = mysqli_query($link, $query);
if (!$result) {
    die('User is not added ' . mysqli_error($link));
}

$query = "SELECT * FROM user";
//$query = "SELECT * FROM user WHERE firstname = 'John'";
$result = mysqli_query($link, $query);
if (!$result) {
    die('Users are not exist ' . mysqli_error($link));
}

while ($row = mysqli_fetch_assoc($result)) {
    printf('Firstname: %s, Lastname: %s <br />', $row['firstname'], $row['lastname']);
}

$query = "UPDATE user SET lastname = 'Хичкок' WHERE firstname = 'John'";
$result = mysqli_query($link, $query);
if (!$result) {
    die('Users are not exist ' . mysqli_error($link));
}
printf('Number of affected rows is ' . mysqli_affected_rows($link));


$query = "DELETE FROM user WHERE lastname = 'Хичкок'";
$result = mysqli_query($link, $query);
if (!$result) {
    die('Users are not exist ' . mysqli_error($link));
}
printf('Number of affected rows is ' . mysqli_affected_rows($link));
