<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 08.03.2017
 * Time: 19:02
 */
$myFile = fopen('data.txt', 'r') or die('Can\'t open file');
echo 'File has been opened successfully';
echo '<br>';

fclose($myFile);
echo 'File has been closed successfully';