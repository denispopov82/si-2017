<?php
if ($myFile = fopen('data.txt', 'r')) {
    $lines = [];
    while ($line = fgets($myFile)) {
        $lines[] = $line;
    }
    fclose($myFile);
}

// or

$content = file('data.txt');
echo "<pre>";
    var_dump($content);
echo "</pre>";
