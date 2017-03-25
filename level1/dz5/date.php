<?php
/**
 * 1. Выведите текущее время в формате timestamp.
 */
echo strtotime('now');
echo '<br>';
echo '<br>';

/**
 * 2. Выведите 1 января 2025 года в формате timestamp.
 */
echo strtotime('2025-01-01');
echo '<br>';
echo '<br>';

/**
 * 3. Выведите 31 декабря текущего года в формате timestamp.
 * Скрипт должен работать независимо от года, в котором он запущен.
 */
echo mktime(0, 0, 0, 12, 31);
echo '<br>';
echo '<br>';

/**
 * 4. Найдите количество секунд, прошедших с 13:12:59 15-го марта 2000 года до настоящего момента.
 */
$last = mktime(13, 12, 59, 3, 15, 2000);
$current = time();
echo $current - $last;
echo '<br>';
echo '<br>';

/**
 * 5. Найдите количество секунд $sec, прошедших с 7:23:48 1-го
 * числа текущего месяца до настоящего момента. Найдите количество минут, часов и дней,
 * содержащихся в $sec (не одновременно, а последовательно: сначала минуты, потом часы и т.д.).
 */
$past = mktime(7, 23, 48, 3, 1);
$current = time();
$sec = $current - $past;
echo 'Seconds: ' . $sec . '<br />';
echo 'Minutes: ' . ($sec * 60) . '<br />';
echo 'Hours: ' . ($sec * 3600) . '<br />';
echo 'Days: ' . (($sec * 3600) * 24) . '<br />';
echo '<br>';

/**
 * 6. Выведите на экран текущий год, день, месяц, час, минуту, секунду.
 */
echo date('Y-m-d H:i:s');
echo '<br>';
echo '<br>';

/**
 * 7. Выведите текущую дату-время в форматах '2013-12-31', '31.12.2013', '31.12.13', '12:59:59'.
 */
echo date('Y-m-d');
echo '<br>';
echo date('d.m.Y');
echo '<br>';
echo date('d.m.y');
echo '<br>';
echo date('H:i:s');
echo '<br>';
echo '<br>';

/**
 * 8. С помощью функций mktime и date выведите 13 февраля 2015 года в формате '31.12.2013'.
 */
echo date('d.m.Y', mktime(0, 0, 0, 2, 13, 2015));
echo '<br>';
echo '<br>';

/**
 * 9. Создайте массив дней недели $week. Выведите на экран название текущего дня
 * недели с помощью массива $week и функции date. Узнайте какой день недели
 * был 21.12.1982, в ваш день рождения.
 */
echo date('l', mktime(0, 0, 0, 12, 21, 1982));
echo '<br>';
echo '<br>';

/**
 * 10. Создайте массив месяцев $month. Выведите на экран название текущего месяца
 * с помощью массива $month и функции date.
 */
$months = [];
for ($i = 1; $i < 13; $i++) {
    $months[$i] = date('F', mktime(0, 0, 0, $i, 21, 2017));
}

echo $months[date('n')];
echo '<br>';
echo '<br>';

/**
 * 11. Найдите номер текущего дня от начала месяца.
 */
echo date('d');
echo '<br>';
echo '<br>';

/**
 * 12. Найдите количество дней в текущем месяце.
 * Скрипт должен работать независимо от месяца, в котором он запущен.
 */
echo date('t');
