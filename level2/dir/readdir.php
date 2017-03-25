<?php
$dir = '.';
$resource = opendir($dir);
while ($file = readdir($resource)) {
    if ($file == '.' || $file == '..') {
        continue;
    }
    if (is_dir($file)) {
        echo '<strong>' . $file . '</strong><br />';
    } elseif (is_file($file)) {
        echo $file . '<br />';
    }
}

//scandir('.');
