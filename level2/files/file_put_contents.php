<?php
$lines = [];
$newString = '\nSix line';
if ($myFile = fopen('data.txt', 'a+')) {
    fputs($myFile, $newString);
}
fclose($myFile);

// w
//file_put_contents('data.txt', $newString);

// a
file_put_contents('data.txt', $newString, FILE_APPEND);
