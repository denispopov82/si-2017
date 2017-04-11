<?php
/**
 * 1. Дана строка. Вывести первые три символа и последние три символа, если длина строки больше 5.
 * Иначе вывести первый символ столько раз, какова длина строки.
 */
function get_string($string)
{
    $length = strlen($string);
    if ($length > 5) {
        $word = substr($string, 0, 3) . '...' . substr($string, -3);
    } else {
        $word = str_repeat($string[0], $length);
    }
    
    return $word;
}

//echo get_string('helloworld');
//echo '<br>';
//echo get_string('hel');
//echo '<br>';

/**
 * 2. Дана строка. Показать третий, шестой, девятый и так далее символы.
 */
$string = '0123456789';
$word = '';
$length = strlen($string);
for ($i = 0; $i < $length; $i += 3) {
    $word .= $string[$i];
}
//echo $word;

/**
 * 3. Дана строка. Разделить строку на фрагменты по три подряд идущих символа.
 * В каждом фрагменте средний символ заменить на случайный символ, не совпадающий ни с одним из символов
 * этого фрагмента. Показать фрагменты, упорядоченные по алфавиту.
 */
$symbols = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
$string = 'aelbothisisaverysimplestringthatispreparedfortheexercise';
$word = '';
$words = [];
$length = strlen($string);
$j = 0;

for ($i = 0; $i < $length; $i++) {
    if ($j < 3) {
        $word .= $string[$i];
        $j++;
    } else {
        $words[] = $word;
        $word = $string[$i];
        $j = 1;
    }
}


$count = count($words);
$count2 = count($symbols);
for ($i = 0; $i < $count; $i++) {
    shuffle($symbols);
    for ($j = 0; $j < $count2; $j++) {
        if ($words[$i][0] != $symbols[$j] && $words[$i][2] != $symbols[$j]) {
            $words[$i][1] = $symbols[$j];
        }
    }
}
sort($words, SORT_STRING);

/**
 * Написать генерацию строк длиной 10 символов: первые 4 символа - цифры,
 * следующие два символы - различные буквы, следующие 4 символа - нули или единицы.
 */
$string = '';
$i = 0;
while ($i < 4) {
    $string .= mt_rand(0, 9);
    $i++;
}

$symbols = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
$keys = array_rand($symbols, 2);
$string .= $symbols[$keys[0]] . $symbols[$keys[1]];

$i = 0;
while ($i < 4) {
    $string .= mt_rand(0, 1);
    $i++;
}

echo $string;







