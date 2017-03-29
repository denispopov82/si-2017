<?php
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
/* execute prepared statement */
mysqli_stmt_execute($stmt);
printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));
/* close statement and connection */
mysqli_stmt_close($stmt);

// ------------- SELECT ROWS ---------------------------------
$query = 'SELECT * FROM user';
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $userId, $firstname, $lastname);

while (mysqli_stmt_fetch($stmt)) {
    printf('ID: %d, firstname: %s, lastname: %s <br />', $userId, $firstname, $lastname);
}
echo '<br>';

// ------------- DELETE ROW -------------------------------------
$query = "DELETE FROM user WHERE firstname LIKE 'DEU%'";
mysqli_query($link, $query);
printf("%d Row deleted.\n", mysqli_affected_rows($link));

/* close connection */
 mysqli_close($link);
