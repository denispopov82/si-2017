<?php
// ALTER TABLE user CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;

$host = 'localhost';
$user = 'root';
$password = 'root';
$port = 'personal';

$link = mysqli_connect($host, $user, $password, $port);
if (!$link) {
    printf("Can't connect to the database. The error code: %s\n", mysqli_connect_error());
    exit;
}

//$firstname = "William";
//$lastname = "O'Genry";
//
//// ----------- 1
//// insert new row
//$query = "INSERT INTO user (`firstname`, `lastname`) VALUES ('$firstname', '$lastname')";
//if (!$result = mysqli_query($link, $query)) {
//    printf("Error %s", mysqli_error($link));
//}
//echo '<br>';
//
//// ---------- 2
//$firstname = mysqli_real_escape_string($link, $firstname);
//$lastname = mysqli_real_escape_string($link, $lastname);
//$query = "INSERT INTO user (`firstname`, `lastname`) VALUES ('$firstname', '$lastname')";
//if (!$result = mysqli_query($link, $query)) {
//    printf("Error %s", mysqli_error($link));
//}
//echo '<br>';


/* Посылаем запрос серверу */
$query = 'SELECT u.firstname, u.lastname FROM `user` u ORDER BY u.user_id DESC';
if ($result = mysqli_query($link, $query)) {
    print("List of users: <br />");
    /* Выборка результатов запроса */
    while ($row = mysqli_fetch_assoc($result)) {
        printf("%s (%s)<br />", $row['firstname'], $row['lastname']);
    }
    /* Освобождаем используемую память */
    mysqli_free_result($result);
}

/* Закрываем соединение */
mysqli_close($link);
