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
    $date1 = !empty($_POST['date1']) ? clean($_POST['date1']) : '';
    $date2 = !empty($_POST['date2']) ? clean($_POST['date2']) : '';
    $format = !empty($_POST['format']) ? clean($_POST['format']) : '';
    $subjects = !empty($_POST['subjects']) ? $_POST['subjects'] : [];
    $phpknown = !empty($_POST['phpknown']) ? (int) $_POST['phpknown'] : 0;
    $age = !empty($_POST['age']) ? (int) $_POST['age'] : 0;
    $age2 = !empty($_POST['age2']) ? (int) $_POST['age2'] : 0;
    $subjects2 = !empty($_POST['subjects2']) ? $_POST['subjects2'] : [];
    
    $date1Ts = strtotime($date1);
    $date2Ts = strtotime($date2);
    
    if (empty($date1)) {
        echo " Enter  Date 1 value!";
    } elseif (isValidDate($date1) == false) {
        echo 'Enter valid date 1 value';
    } else {
        /**
         * 1.    Пользователь вводит число, а скрипт определяет високосный ли год.
         * Сделать проверку на формат и количество введенных значений.
         * Если есть ошибка - уведомить об этом пользователя.
         */
        echo "1. ";
        $isleap = isLeapYear(date('Y', $date1Ts));
        if ($isleap) {
            echo 'Year is leap';
        } else {
            echo 'Year is not leap';
        }
        echo '<br>';
        
        /**
         * 2.Пользователь передает две даты. Первую дату запишите в переменную $date1, а вторую в $date2.
         * Сравните, какая из введенных дат больше.
         * С помощью функций explode и mktime переведите большую дату в формат timestamp.
         * По этому timestamp узнайте день недели (словом, латиницей) и выведите его на экран.
         */
        if (!empty($date1) && !empty($date2)) {
            if (empty($date2)) {
                echo " Enter  Date 2 value!";
            } elseif (isValidDate($date2) == false) {
                echo 'Enter valid date 2 value';
            } else {
                $biggestDate = null;
                if ($date1Ts >= $date2Ts) {
                    $biggestDate = $date1Ts;
                } else {
                    $biggestDate = $date2Ts;
                }
                echo '2. ';
                echo date('l', $biggestDate);
                echo '<br>';
            }
        }
        
        /**
         * 3.    В поле вводится дата. Прибавьте к этой дате 1 год 2 месяца и 3 дня.
         * Отнимите от этой даты 5 дней.
         * Результат преобразуйте ее в выбранный формат и отобразите на экране.
         */
        $tmpdate = strtotime('+3days +2month +1year', $date1Ts);
        $tmpdate = strtotime('-5days', $tmpdate);
        if (!empty($format)) {
            echo " 3. ";
            echo date($format, $tmpdate);
            echo '<br>';
        }
        
        /**
         * 7. Пользователь в форму вводит дату, например, 2017-01-01.
         * Найдите количество дней, часов, минут, секунд, прошедших с 2017-01-01 23:59:59 до настоящего момента.
         */
        $oldTime = strtotime('2017-01-01 23:59:59');
        $oldTimeSeconds = $date1Ts - $oldTime;
        echo '7. ';
        echo 'DAYS - ' . floor(($oldTimeSeconds / 3600 / 24)) . '; '.
            'HOURS - '. round(($oldTimeSeconds / 3600)) . '; '.
            'MINUTES - ' . round(($oldTimeSeconds/60)) . '; '.
            'SECONDS - ' . $oldTimeSeconds;
        echo '<br>';
        
        /**
         * 8. Пользователь в форму вводит дату. Узнайте какой день недели был 100 лет назад.
         */
        $tmpdate = strtotime('-100year', $date1Ts);
        if (!empty($format)) {
            echo " 8. ";
            echo date('l', $tmpdate);
            echo '<br>';
        }
        
        /**
         * 9. Добавьте на форму 4 элемента с типом checkbox, сгруппированных с помощью элемента fieldset.
         * Чекбоксы должны иметь названия: html, css, php, javascript. Названия чекбоксам задаются с помощью
         * элемента label. Спросите у пользователя, какие из языков он знает: html, css, php, javascript.
         * Выведите на экран те языки, которые знает пользователь. Если пользователь не отметил ни один язык —
         * выведите на экран сообщение об этом.
         */
        if (empty($subjects)) {
            echo 'Choose any subject!';
        } else {
            $subjects = array_map(
                function ($subject) {
                    return '<strong>' . $subject . '</strong>';
                },
                array_keys($subjects)
            );
            
            echo 'You may know: ' . implode(', ', $subjects);
            echo '<br>';
        }
        
        /**
         * 10. Создайте html-форму. Спросите у пользователя знает ли он PHP с помощью двух radio-кнопок.
         * Выведите результат на экран. Сделайте так, чтобы по умолчанию один из вариантов был уже отмечен.
         */
        echo ($phpknown) ? 'You know PHP' : 'You don\'t know PHP';
        echo '<br>';
        
        /**
         * 11. Создайте html-форму. Спросите у пользователя его возраст с помощью нескольких radio-кнопок,
         * сгруппированных элементом fieldset. Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30,
         * более 30. Результат выдайте на экран в видет “Ваш возраст в диапазоне <n> лет”.
         */
        if ($age) {
            echo 'Your age is ' . $age . '<br />';
        }
        
        /**
         * 12. Создайте html-форму. Спросите у пользователя его возраст с помощью select.
         * Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30, более 30.
         */
        if ($age2) {
            echo 'Your age is ' . $age2 . '<br />';
        }
        
        /**
         * 13. Создайте html-форму. Спросите у пользователя с помощью элемента multiselect,
         * какие из языков он знает: html, css, php, javascript. Выведите на экран те языки,
         * которые знает пользователь.
         */
        if (!empty($subjects2)) {
            $subjects2 = array_map(
                function ($subject) {
                    return '<strong>' . $subject . '</strong>';
                },
                array_values($subjects2)
            );
    
            echo 'Subjects you may know: ' . implode(', ', $subjects2);
            echo '<br>';
        }
        
        
        
    }
}

if (!empty($_GET)) {
    $date = !empty($_GET['date']) ? (int) clean($_GET['date']) : '';
    $dateTs = strtotime($date);
    if ((bool) $dateTs) {
        /**
         * 4.    С помощью адресной строки передайте
         * GET-параметр date, который хранит год (4 числа).
         * Посчитайте сколько воскресений в введенном году приходится на первое число месяца.
         */
        $sundayCount = 0;
        for ($i = 1; $i < 13; $i++) {
            $tmpdate = mktime(0, 0, 0, $i, 1, $date);
            $tmpdate = date('N', $tmpdate);
            
            if ($tmpdate == 7) {
                $sundayCount++;
            }
        }
        echo '4.  Number of Sunday is ' . $sundayCount;
        echo '<br>';
        
        /**
         * 5.    С помощью адресной строки передайте GET-параметр date, который хранит год (4 числа).
         * Найдите все пятницы 13-е в этом году. Результат выведите в виде списка дат.
         */
        $fridays = [];
        for ($i = 1; $i < 13; $i++) {
            $tmpdate = mktime(0, 0, 0, $i, 13, $date);
            $tmpdateFriday = date('N', $tmpdate);
            
            if ($tmpdateFriday == 5) {
                $fridays[] = date('Y-m-d', $tmpdate);
            }
        }
        if (!empty($fridays)) {
            echo ' 5. List of Fridays: ' . $sundayCount;
            echo implode(', ', $fridays);
            echo '<br>';
        }
        /**
         * 6.    Дан GET-параметр date, в который вводится год.
         * Узнайте, какой это будет год по восточному календарю. Результат выведите на экран.
         */
        $animals = [
            'Крыса', 'Бык', 'Тигр', 'Кролик',
            'Дракон', 'Змея', 'Лошадь', 'Коза',
            'Обезьяна', 'Петух', 'Собака', 'Кабан'];
        $animal = null;
        $year = 1900;
        for ($i = 1; $i < 13; $i++) {
            $tmpdate = $year;
            while (($tmpdate) <= $date) {
                if ($tmpdate == $date) {
                    $animal = $animals[$i];
                    break;
                }
                $tmpdate += 12;
            }
            $year += $i;
        }
        echo '6. Enter Date in Chineese calendar is ' . $animal;
    }
}

/**
 * 14. Сделайте функцию, которая создаёт html элемент. Функция должна иметь
 * следующие параметры: type, name, value, placeholder.
 * В функцию на вход может попасть только input или textarea. В любом другом случае необходимо
 * вывести предупреждение об ошибке.
 */
function getElement($type, $name, $value, $placeholder)
{
    if ($type == 'text') {
        return '<input type="text" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
    } elseif ($type == 'textarea') {
        return '<textarea name="' . $name . '">' . $value . '</textarea>';
    } else {
        echo 'Type is not correct.';
    }
    
    return '';
}

/**
 * 15. Сделайте функцию, которая будет создавать селект. Функция должна принимать многомерный массив,
 * например:
 * $arr = array(
 *      0 => array('value'=>'php', 'text'=>'Язык PHP'),
 *      1 => array('value'=>'html', 'text'=>'Язык HTML'),
 * )
 */
function getSelect($options)
{
    $select = '<select name="custom_select">';
    foreach ($options as $value) {
        $select .= '<option value="' . $value['value'] . '">' . $value['text'] . '</option>';
    }
    $select .= '</select>';
    
    return $select;
}
