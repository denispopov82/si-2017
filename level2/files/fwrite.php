<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 08.03.2017
 * Time: 19:02
 */
$myFile = fopen('data.txt', 'a+') or die('Can\'t open file');
fwrite($myFile, "\rNext line");
fclose($myFile);
