<?php
$myFile = fopen('data.txt', 'a') or die('Can\'t open file');

fwrite($myFile, "\rNext line");

fclose($myFile);
