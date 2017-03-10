<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 08.03.2017
 * Time: 19:02
 */
if ($myFile = fopen('data.txt', 'r')) {
    $lines = [];
    
    while ($line = fgets($myFile)) {
        $lines[] = $line;
    }
    fclose($myFile);
    echo "<pre>";
        var_dump($lines);
    echo "</pre>";
}
