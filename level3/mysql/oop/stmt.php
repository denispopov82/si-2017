<?php
/* Подключение к серверу MySQL */
$link = new mysqli(
    $host,
    $username,
    $password
);

if (!empty($link->connect_error)) {
    die($link->connect_error);
}
if (!$link->select_db($dbname)) {
    die($link->error);
}
$link->query('SET NAMES utf8');

$firstname = 'DEU_' . time();
$lastname = 'Bavarian_' . time();

// ------------- INSERT ROW ---------------------------------
$query = 'INSERT INTO user (`firstname`, `lastname`) VALUES (?, ?)';
$stmt = $link->prepare($query);
$stmt->bind_param('ss', $firstname, $lastname);
$result = $stmt->execute();
if (!$result) {
    die('User is not added ' . $stmt->error);
}

// ---------------- SELECT ----------------------------------
$query = "SELECT firstname, lastname FROM user";
$stmt = $link->prepare($query);
$result = $stmt->execute();
if (!$result) {
    die('Users are not exist ' . $stmt->error);
}

while ($stmt->fetch()) {
    $stmt->bind_result($firstname, $lastname);
    printf('Firstname: %s, Lastname: %s <br />', $firstname, $lastname);
}

// ---------------- UPDATE ----------------------------------
$lastnameTo = 'Хичкок';
$lastnameFrom = 'Doe';
$query = "UPDATE user SET lastname = ? WHERE lastname = ?";
$stmt = $link->prepare($query);
$stmt->bind_param('ss', $lastnameTo, $lastnameFrom);
$result = $stmt->execute();
if (!$result) {
    die('User is not updated ' . $stmt->error);
}
printf('Number of affected rows is ' . $stmt->affected_rows);
echo '<br>';

// ----------------- DELETE --------------------------------
$lastnameDelete = 'Bavarian_%';
$query = "DELETE FROM user WHERE lastname LIKE ?";
$stmt = $link->prepare($query);
$stmt->bind_param('s', $lastnameDelete);
$result = $stmt->execute();
if (!$result) {
    die('User is not deleted ' . $stmt->error);
}
printf('Number of affected rows is ' . $stmt->affected_rows);
echo '<br>';
