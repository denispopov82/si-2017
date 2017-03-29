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

$firstname = 'DEU';
$lastname = 'Bavarian';

$query = 'INSERT INTO user (`firstname`, `lastname`) VALUES (?, ?)';
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, 'ss', $firstname, $lastname);
/* execute prepared statement */
mysqli_stmt_execute($stmt);
printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));
/* close statement and connection */
mysqli_stmt_close($stmt);

mysqli_query($link, "DELETE FROM user WHERE firstname='DEU'");
printf("%d Row deleted.\n", mysqli_affected_rows($link));

/* close connection */
 mysqli_close($link);
