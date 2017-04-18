<?php
/**
 * 1. Написать функцию ХХХ (имя подставьте своё), которая на вход принимает необязательный параметр - число,
 * по-умолчанию равное 0. Значение параметра необходимо приводить к числу.
 * В функции необходимо создать файл (в последующем обращении - открыть существующий) и записывать значение
 * параметра в файл. Если файл пустой, то запишется число из параметра. Если файл не пустой, то к значению в
 * файле необходимо прибавить значение в параметре и записать в тот же файл. Например, в файле хранится число 5,
 * в параметре 2, в файл запишется 7.
 */
function myIncrement($number = 0)
{
    $resource = fopen('number.txt', 'a+');
    if (filesize('number.txt') == 0) {
        fwrite($resource, $number);
    } else {
        $value = (int) fgets($resource);
        $value += $number;
        ftruncate($resource, 0);
        fwrite($resource, $value);
    }
}

//myIncrement(5);
//myIncrement(10);

/**
 * 2. Даны два файла ХХХ и YYY. В файлах записаны тестовые слова (на латинице, придумайте сами).
 * разделенными пробелами. Необходимо написать функцию, которая создаст новый три файла:
 * only_first.txt: содержащий строки, которые встречаются только в первом файле;
 * both.txt: только строки, которые встречаются в обоих файлах;
 * more_two.txt: только строки, которые встречаются в каждом файле более двух раз.
 */
function myDiff()
{
    $resrouce1 = fopen('x.txt', 'r+');
    $xData = fgets($resrouce1);
    $xData = explode(' ', trim($xData));
    
    $resrouce2 = fopen('y.txt', 'r+');
    $yData = fgets($resrouce2);
    $yData = explode(' ', trim($yData));
    
    $onlyFirst = array_diff($xData, $yData);
    $onlyFirst = array_unique($onlyFirst);
    fwrite(
        fopen('only_first.txt', 'a+'),
        implode(' ', $onlyFirst)
    );

    $both = array_intersect($xData, $yData);
    $both = array_unique($both);
    fwrite(
        fopen('both.txt', 'a+'),
        implode(' ', $both)
    );
    
    $xDataCount = array_count_values($xData);
    $yDataCount = array_count_values($yData);

    $resource3 = fopen('more_two.txt', 'a+');
    foreach ($xDataCount as $letter => $dataCount) {
        if ($dataCount > 2) {
            fwrite($resource3, $letter);
        }
    }
    foreach ($yDataCount as $letter => $dataCount) {
        if ($dataCount > 2) {
            fwrite($resource3, $letter);
        }
    }
}

//myDiff();

/**
 * 3. Дан файл со словами. Упорядочить слова по алфавиту и записать в тот же файл.
 */
function myWordsOrder()
{
    $words = file('words.txt');
    $words = array_filter($words);
    $words = array_map('trim', $words);
    sort($words, SORT_STRING);
    fwrite(
        fopen('words.txt', 'w'),
        implode(' ', $words)
    );
}

//myWordsOrder();

/**
 * 4. Дан файл. Каждая строка содержит имя, пароль и email, разделенные символами ':' (двоеточие).
 * Например:
 * john:12345:john@gmail.com
 * kate:12345:kate@gmail.com
 * test:21345:test@gmail.com
 * mike:12145:test@gmail.com
 *
 * Удалить строки с повторами email и строки, в которых совпадают имена
 * (т.е. удалится последняя запись).
 */
function makeUnique()
{
    $resource = fopen('users.txt', 'r');
    $users = [];
    while ($row = fgets($resource)) {
        list($username, $password, $email) = explode(':', $row);
        $users[] = [
            'username' => trim($username),
            'password' => trim($password),
            'email' => trim($email),
        ];
    }
    
    $unique = [];
    foreach ($users as $user) {
        if (empty($unique)) {
            $unique[] = $user;
        } else {
            $usernames = array_column($unique, 'username');
            $emails = array_column($unique, 'email');
            if (!in_array($user['username'], $usernames) && !in_array($user['email'], $emails)) {
                $unique[] = $user;
            }
        }
    }
    
    return $unique;
}

$unique = makeUnique();

/**
 * 5. Написать функцию, которая будет показывать список всех файлов в данной папке в виде дерева, как показано на ниже (поиск файлов происходит и во всех вложенных уровнях).
root dir
-- dir 1
-- dir 2
---- dir 2.1
---- dir 2.2
------ dir 2.2.1
---- dir 2.3
 */
function tree($root, $space)
{
    $arr = scandir($root);
    foreach ($arr as $value) {
        if (($value == '.') || ($value == '..')) {
            continue;
        }
        $path = $root . '/' . $value;
        if (is_dir($path)) {
            echo $space . ' ' . $value . "<br>";
            tree($path, $space . '-');
        } else {
            echo $space . ' ' . $value . "<br>";
        }
    }
}
tree('./../', '--');
