<?php
/**
 * 1. Дан массив с произвольными числами. Сделайте так,
 * чтобы элемент повторился в массиве количество раз,
 * соответствующее его числу. Пример: array(1, 3, 2, 4) превратится
 * в array(1, 3, 3, 3, 2, 2, 4, 4, 4, 4).
 *
 * @param array $arr
 *
 * @return array
 */
function num_repeat($arr)
{
    $count = count($arr);
    $result = [];
    for ($i = 0; $i < $count; $i++) {
        for ($j = 0; $j < $arr[$i]; $j++) {
            $result[] = $arr[$i];
        }
    }
    
    return $result;
}

$array = array(1, 3, 2, 4);
$result = num_repeat($array);
echo "<pre>";
var_dump($result);
echo "</pre>";

/**
 * 2. Дан массив с произвольными целыми числами.
 * Сделайте так, чтобы первый элемент стал ключом второго элемента,
 * третий элемент - ключом четвертого и так далее.
 * Пример: array(1, 2, 3, 4, 5, 6) превратится в array(1=>2, 3=>4, 5=>6).
 *
 * @param array $arr
 *
 * @return array
 */
function array_revert($arr)
{
    $count = count($arr) / 2;
    $result = [];
    $index = 0;
    for ($i = 0; $i < $count; $i++) {
        $value = isset($arr[$index + 1]) ? $arr[$index + 1] : 0;
        $result[$arr[$index]] = $value;
        $index += 2;
    }
    
    return $result;
}

$arr = array(1, 2, 3, 4, 5, 6, 7);
$result = array_revert($arr);
echo "<pre>";
var_dump($result);
echo "</pre>";

/**
 * 3. Дана строка. Удалите из этой строки четные символы.
 *
 * @param string $str
 *
 * @return string
 */
function my_odd($str)
{
    $length = strlen($str);
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        if ($i % 2 == 0) {
            $result .= $str[$i];
        }
    }
    
    return $result;
}

$result = my_odd('abcdefgh');
echo $result;
echo '<br>';

/**
 * 4. Дана строка. Поменяйте ее первый символ на второй и наоборот,
 * третий на четвертый и наоборот, пятый на шестой и наоборот
 * и так далее. То есть из строки '12345678' нужно сделать '21436587'.
 *
 * @param string $str
 *
 * @return string
 */
function str_revert($str)
{
    $length = strlen($str) / 2;
    $result = '';
    $index = 0;
    for ($i = 0; $i < $length; $i++) {
        $result .= $str[$index + 1] . $str[$index];
        $index += 2;
    }
    
    return $result;
}

$result = str_revert('12345678');
echo $result;
echo '<br>';

/**
 * 5. Напишите функцию, которой в параметре передается передается массив
 * из случайных чисел. Функция возвращает массив из
 * уникальных (не повторяющихся) значений (аналог функции array_unique).
 *
 * @param array $arr
 *
 * @return array
 */
function my_array_unique($arr)
{
    $result = [];
    foreach ($arr as $key => $value) {
        $isDuplicate = false;
        foreach ($result as $key2 => $value2) {
            if ($value == $value2) {
                $isDuplicate = true;
                break;
            }
        }
        if (!$isDuplicate) {
            $result[$key] = $value;
        }
    }
    
    return $result;
}

$input = array("a" => "green", "red", "b" => "green", "blue", "red");
$result = my_array_unique($input);
echo "<pre>";
var_dump($result);
echo "</pre>";

/**
 * 6. Напишите функцию, которая будет противоположной array_unique,
 * т.е. будет оставлять дубликаты, но удалять не повторяющиеся значения.
 *
 * @param array $arr
 *
 * @return array
 */
function my_array_not_unique($arr)
{
    $unique = [];
    // collect unique elements
    // array("a" => "green", "red", "b" => "green", "blue", "red");
    foreach ($arr as $key => $value) {
        if (isset($unique[$value])) {
            $unique[$value]++;
        } else {
            $unique[$value] = 1;
        }
    }
    
    // collect non unique elements
    $notUnique = [];
    foreach ($unique as $key => $value) {
        if ($value > 1) {
            for ($i = 0; $i < $value; $i++) {
                $notUnique[] = $key;
            }
        }
    }
    
    return $notUnique;
}

$input = array("a" => "green", "red", "b" => "green", "blue", "red");
$result = my_array_not_unique($input);
echo "<pre>";
var_dump($result);
echo "</pre>";

/**
 * 7. Напишите функцию, которой передается фамилия имя и отчество,
 * а функция возвращает фамилию и инициалы. Например, передаем
 * Ivanov Ivan Ivanovich и нам выводит: Ivanov I. I.
 *
 * @param string $str
 *
 * @return string
 */
function my_name($str)
{
    $length = strlen($str);
    $word = '';
    $words = [];
    for ($i = 0; $i < $length; $i++) {
        if ($str[$i] == ' ') {
            $words[] = $word;
            $word = '';
        } elseif ($i == $length - 1) {
            $word .= $str[$i];
            $words[] = $word;
        } else {
            $word .= $str[$i];
        }
    }
    
    
    $result = [];
    if (!empty($words)) {
        foreach ($words as $key => $word) {
            if ($key == 0) {
                $result[] = $word;
            } else {
                $result[] = $word{0} . '.';
            }
        }
    }
    
    return implode(' ', $result);
}

echo my_name('Ivanov Ivan Ivanovich');
echo '<br>';
echo '<br>';

/**
 * 8. Таблица умножения. Напишите функцию, которая принимает на вход два параметра:
 * количество строк и количество колонок. Функция возвращает (не выводит на экран!)
 * таблицу умножения вида http://joxi.ru/brR577kiJJNRXA.
 * Можно использовать table или div теги html. Цвет перемножаемых колонок и строк можете
 * задать отдельным третьим параметром в виде hex-кода цвета.
 *
 * @param integer $rows
 * @param integer $colls
 *
 * @return string
 */
function mutitable($rows, $colls)
{
    $table = '<table width="400px" border="1">';
    for ($i = 1; $i <= $rows; $i++) {
        $table .= '<tr align="center">';
        for ($j = 1; $j <= $colls; $j++) {
            if ($i == 1 || $j == 1) {
                $style = 'style="background-color: green; color: white; height: 35px; width: 20px"';
                $table .= "<th $style>" . $i * $j . '</th>';
            } else {
                $table .= '<td>' . $i * $j . '</td>';
            }
        }
        $table .= '</tr>';
    }
    $table .= '</table>';
    
    return $table;
}

echo mutitable(5, 5);
echo '<br>';

/**
 * 9. Написать рекурсивную функцию, которая на вход получает число и вычисляет
 * и возвращает значение факториала этого числа.
 *
 * @param integer $n
 *
 * @return int
 */
function factorial($n)
{
    if ($n == 1) {
        return 1;
    }
    
    return factorial($n - 1) * $n;
}

echo factorial(4);
echo '<br>';

/**
 * 10. Написать функцию (рекурсивную либо обычную - по желанию), которая принимает на вход параметр (например, $n)
 * и вычисляет число Фибоначчи до предела $length. Результат вычисления возвращается этой же функцией.
 *
 * @param integer $num
 *
 * @return int
 */
function fibonacci($num)
{
    if ($num < 3) {
        return 1;
    } else {
        return fibonacci($num - 1) + fibonacci($num - 2);
    }
}

function fibonacci_limited($limit)
{
    $result = '';
    for ($n = 1; $n <= $limit; $n++) {
        $result .= fibonacci($n);
        if ($n != $limit) {
            $result .= ', ';
        }
    }
    
    return $result;
}

echo fibonacci_limited(8);
echo '<br>';
echo '<br>';

/**
 * 11. Напишите рекурсивную функцию, принимающую на вход натуральное число $n.
 * Функция возвращает строку из всех чисел от 1 до $n либо от $n до 1. За порядок сортировки должен отвечать
 * дополнительный параметр функции - $order, который может принимать значение ‘desc’ (убывающий)
 * или ‘asc’ (возрастающий) и по-умолчанию должен быть равен ‘desc’.
 *
 * @param int    $num
 * @param string $order
 *
 * @return string
 */
function my_sort_rand($num, $order = 'desc')
{
    $result = '';
    static $index = 1;
    
    if ($order == 'desc') {
        if ($num == 0) {
            return $result;
        }
        $result .= $num;
        $num--;
    } elseif ($order == 'asc') {
        $result .= $index;
        if ($index == $num) {
            return $result;
        }
        $index++;
    }
    
    $result .= my_sort_rand($num, $order);
    
    return $result;
}

$res = my_sort_rand(5);
echo $res;
echo '<br>';
$res = my_sort_rand(5, 'asc');
echo $res;
echo '<br>';

/**
 * 12. Напишите функцию, которая подсчитывает количество всех значений массива.
 * Функция должна учитывать вложенность массивов.
 *
 * @param array $arr
 *
 * @return array
 */
function my_array_count_values($arr)
{
    $result = [];
    foreach ($arr as $key => $value) {
        if (isset($result[$value])) {
            $result[$value]++;
        } else {
            $result[$value] = 1;
        }
    }
    
    return $result;
}

$array = ['a', 'a', 'b', 'c', 'c', 'd'];
$result = my_array_count_values($array);
echo "<pre>";
var_dump($result);
echo "</pre>";
