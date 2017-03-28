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
