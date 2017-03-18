<?php
function clean($value)
{
    return strip_tags(trim($value));
}

function isValidDate($date)
{
    return (bool) strtotime($date) && date('Y-m-d', strtotime($date)) === $date;
}

function isLeapYear($year)
{
    return ($year % 4 == false) || ($year / 100 == false);
}

if (!empty($_POST)) {
    $date1 = !empty($_POST['date1']) ? clean($_POST['date1']): '';
    $date2 = !empty($_POST['date2']) ? clean($_POST['date2']): '';
    $format = !empty($_POST['format']) ? clean($_POST['format']) : '';
    
    if (empty($date1)) {
        echo 'Enter Date 1 value!';
    } elseif (isValidDate($date1) == false) {
        echo 'Enter valid Date 1 value!';
    } else {
        /**
         * 1. Пользователь вводит число, а скрипт определяет високосный ли год. С
         * делать проверку на формат и количество введенных значений.
         * Если есть ошибка - уведомить об этом пользователя.
         */
        $isLeap = isLeapYear(date('Y', strtotime($date1)));
        if ($isLeap) {
            echo 'Year is leap.';
        } else {
            echo 'Year is not leap.';
        }
    }
}
