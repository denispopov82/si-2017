<?php
$lines = [];
$newString = "\r\nSix line";
if ($myFile = fopen('data.txt', 'a+')) {
    fputs($myFile, $newString);
}
fclose($myFile);
