<?php
// create table workers with fields: id, name, age, salary
$link = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($link, 'personal');
mysqli_query($link, 'SET NAMES utf8');

$query = 'CREATE TABLE IF NOT EXISTS workers (
    `id` int(5) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `age` INT(2),
    `salary` INT(5)
) DEFAULT CHARSET=utf8;';
mysqli_query($link, $query) or die('Table is not created' . mysqli_error($link));

$query = 'INSERT INTO workers (`name`, `age`, `salary`) VALUES
    (\'Дима\', 23, 400),
    (\'Петя\', 25, 500),
    (\'Вася\', 23, 500),
    (\'Коля\', 30, 1000),
    (\'Иван\', 27, 500),
    (\'Кирилл\', 28, 1000);';
//mysqli_query($link, $query) or die('Rows are not inserted: ' . mysqli_error($link));

/**
 * 1. Выбрать работника с id=3.
 */

/**
 * 2. Выбрать работников с зарплатой 500$.
 */
