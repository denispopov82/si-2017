<?php
$lines = [];
if ($myFile = fopen('data.txt', 'r')) {
    while (!feof($myFile)) {
        $lines[] = fgets($myFile);
    }
}
fclose($myFile);
echo "<pre>";
    var_dump($lines);
echo "</pre>";
echo '<p>File has been closed successfully!</p>';
