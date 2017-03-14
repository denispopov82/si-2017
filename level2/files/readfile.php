<?php
$myFile = fopen('data.txt', 'r') or die('Can\'t open file');
echo fread($myFile, 5);
fclose($myFile);

// or

readfile('data.txt');
