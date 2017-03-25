<?php
$lines = [];
if ($myFile = fopen('data.txt', 'r')) {
    while (($myLine = fgetc($myFile)) == true) {
        $lines[] = $myLine;
    }
}
fclose($myFile);

echo "<pre>";
    var_dump($lines);
echo "</pre>";
