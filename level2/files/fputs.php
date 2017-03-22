<?php
$lines = [];
$newString = "\nNext line";
if ($myFile = fopen('data.txt', 'a+')) {
    fputs($myFile, $newString);
}
fclose($myFile);
