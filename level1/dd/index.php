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

echo get_string('helloworld');
echo '<br>';
echo get_string('hel');
echo '<br>';

/**
 * 2. Дана строка. Показать третий, шестой, девятый и так далее символы.
 */
$string = '0123456789';
$word = '';
$length = strlen($string);
for ($i = 0; $i < $length; $i += 3) {
    $word .= $string[$i];
}
echo $word;

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
for ($i = 0; $i < $count; $i++) {
    for ($j = 0; $j < count($symbols); $j++) {
        if ($words[$i][0] != $symbols[$j] && $words[$i][2] != $symbols[$j]) {
            $words[$i][1] = $symbols[$j];
        }
    }
}

//$symbols = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
//$symbolsCount = count($symbols);
//$string = 'hellothisisaverysimplestringthatispreparedfortheexercise';
//$length = strlen($string);
//$parts = [];
//$part = '';
//for ($i = 0, $index = 1; $i < $length; $i++, $index++) {
//    $part .= $string[$i];
//    if ($index == 3) {
//        do {
//            $randomKey = array_rand($symbols, 1);
//            $randomSymbol = $symbols[$randomKey];
//            $isEqual = ($randomSymbol == $part[0] || $randomSymbol == $part[1] || $randomSymbol == $part[2]);
//            if (!$isEqual) {
//                $part[1] = $randomSymbol;
//            }
//        } while ($isEqual);
//
//        $parts[] = $part;
//        $index = 0;
//        $part = '';
//    }
//}
//sort($parts);
