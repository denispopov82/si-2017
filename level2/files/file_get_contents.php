<?php
$myFile = fopen('data.txt', 'r') or die('Can\'t open file');
echo fread($myFile, filesize('data.txt'));
fclose($myFile);
echo '<br>';
echo '<br>';

// or

readfile('data.txt');
echo '<br>';
echo '<br>';

// or

$content = file_get_contents('data.txt');
echo $content;
