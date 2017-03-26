<?php
/*$pattern = '/([A-Za-z ]+)(?:ith)/';
$string = 'John Smith';
$matches = [];
echo preg_match($pattern, $string, $matches);

echo "<pre>";
var_dump($matches);
echo "</pre>";*/


$string = 'April 15, 2015';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '1th of $1, $3';
echo preg_replace($pattern, $replacement, $string);

echo "Hello \" Name \"";
