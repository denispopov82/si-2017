<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 08.03.2017
 * Time: 19:02
 */
if ($myFile = fopen('data.txt', 'r')) {
    $chars = [];
    while ($character = fgetc($myFile)) {
        $chars[] = $character;
    }
    fclose($myFile);
    echo "<pre>";
        var_dump($chars);
    echo "</pre>";
}
