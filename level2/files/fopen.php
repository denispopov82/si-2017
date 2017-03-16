<?php
$myFile = fopen('data.txt', 'r') or die('File can\'t be opened');
echo '<p>File is opened successfully!</p>';

fclose($myFile);
echo '<p>File has been closed successfully!</p>';
