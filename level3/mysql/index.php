<?php
$link = mysqli_connect('localhost', 'root', 'root', 'guestbook');

/* check connection */
if (!$link) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = mysqli_prepare($link, "INSERT INTO user (`firstname`, `lastname`) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, 'ss', $firstname, $lastname);

$firstname = 'DEU';
$lastname = 'Bavarian';

/* execute prepared statement */
mysqli_stmt_execute($stmt);

printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));

/* close statement and connection */
mysqli_stmt_close($stmt);

/* Clean up table CountryLanguage */
mysqli_query($link, "DELETE FROM user WHERE firstname='DEU'");
printf("%d Row deleted.\n", mysqli_affected_rows($link));

/* close connection */
 mysqli_close($link);
