<?php
$dir = opendir('./../files');
while ($name = readdir($dir)) {
    if (is_dir($name)) {
        echo '<strong>' . $name . '</strong>><br>';
    } else {
        echo $name . '<br>';
    }
}
closedir($dir);
