<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 08.03.2017
 * Time: 19:02
 */
if ($myFile = fopen('data.html', 'r')) {
    $lines = [];
    
    while ($line = fgetss($myFile, 1024, '<p></p>')) {
        $lines[] = $line;
    }
    fclose($myFile);
    echo "<pre>";
        var_dump($lines);
    echo "</pre>";
}
