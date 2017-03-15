<?php
$myFile = fopen('data.txt', 'r') or die('File can\'t be opened');
echo fread($myFile, filesize('data.txt'));
fclose($myFile);
echo '<br>';
echo '<br>';

// OR
readfile('data.txt');
