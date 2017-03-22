<?php
$lines = [];
if ($myFile = fopen('data.txt', 'r')) {
    while ($myLine = fgets($myFile)) {
        $lines[] = $myLine;
    }
}
fclose($myFile);

// OR

$content = file('data.txt');
echo "<pre>";
    var_dump($content);
echo "</pre>";
