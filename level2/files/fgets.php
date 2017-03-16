<?php
$lines = [];
if ($myFile = fopen('data.txt', 'r')) {
    while ($myLine = fgets($myFile)) {
        $lines[] = $myLine;
    }
}

$myFile = fopen('data.txt', 'r');
fpassthru($myFile);
    
//fclose($myFile);
//echo "<pre>";
//    var_dump($lines);
//echo "</pre>";

