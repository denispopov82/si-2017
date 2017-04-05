<?php
function execute($stmt, $types, $params)
{
    $aParams = [];
    for ($i = 0; $i < count($params); $i++) {
        $aParams[] = &$params[$i];
    }
    array_unshift($aParams, $types);
    array_unshift($aParams, $stmt);
    
    call_user_func_array('mysqli_stmt_bind_param', $aParams);
    
    return mysqli_stmt_execute($stmt);
}

/* Подключение к серверу MySQL */
$link = mysqli_connect(
    'localhost', /* Хост, к которому мы подключаемся */
    'root', /* Имя пользователя */
    'root', /* Используемый пароль */
    'personal'
);
if (!$link) {
    printf("Can't connect to the database. The error code: %s\n", mysqli_connect_error());
    exit;
}
mysqli_query($link, 'SET NAMES utf8');

$firstname = 'DEU_' . time();
$lastname = 'Bavarian_' . time();

// ------------- INSERT ROW ---------------------------------
$query = 'INSERT INTO user (`firstname`, `lastname`) VALUES (?, ?)';
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, 'ss', $firstname, $lastname);
$result = mysqli_stmt_execute($stmt);
if (!$result) {
    die('User is not added ' . mysqli_stmt_error($stmt));
}

// ---------------- SELECT ----------------------------------
$query = "SELECT firstname, lastname FROM user";
$stmt = mysqli_prepare($link, $query);
$result = mysqli_stmt_execute($stmt);
if (!$result) {
    die('Users are not exist ' . mysqli_error($link));
}

while (mysqli_stmt_fetch($stmt)) {
    mysqli_stmt_bind_result($stmt, $firstname, $lastname);
    printf('Firstname: %s, Lastname: %s <br />', $firstname, $lastname);
}

// ---------------- UPDATE ----------------------------------
$lastnameTo = 'Хичкок';
$lastnameFrom = 'Doe';
$query = "UPDATE user SET lastname = ? WHERE lastname = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, 'ss', $lastnameTo, $lastnameFrom);
$result = mysqli_stmt_execute($stmt);
if (!$result) {
    die('User is not updated ' . mysqli_stmt_error($stmt));
}
printf('Number of affected rows is ' . mysqli_stmt_affected_rows($stmt));
echo '<br>';

// ----------------- DELETE --------------------------------
$lastnameDelete = 'Bavarian_%';
$query = "DELETE FROM user WHERE lastname LIKE ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, 's', $lastnameDelete);
$result = mysqli_stmt_execute($stmt);
if (!$result) {
    die('User is not deleted ' . mysqli_stmt_error($stmt));
}
printf('Number of affected rows is ' . mysqli_stmt_affected_rows($stmt));
echo '<br>';
