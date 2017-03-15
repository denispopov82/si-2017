<?php
$lines = [];
if ($myFile = fopen('data.txt', 'r')) {
    while ($myLine = fgets($myFile)) {
        $lines[] = $myLine;
    }
}
fclose($myFile);
echo "<pre>";
    var_dump($lines);
echo "</pre>";
