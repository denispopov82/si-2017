<?php
$lines = [];
$newString = '\nSix line';
if ($myFile = fopen('data.txt', 'a+')) {
    fputs($myFile, $newString);
}
fclose($myFile);
