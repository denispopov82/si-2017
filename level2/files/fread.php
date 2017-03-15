<?php
$myFile = fopen('data.txt', 'r') or die('File can\'t be opened');
//    echo fread($myFile, 5) . '<br>';
//    echo fread($myFile, 3);
//    echo fread($myFile, 1024);
// OR
echo fread($myFile, filesize('data.txt'));

fclose($myFile);
