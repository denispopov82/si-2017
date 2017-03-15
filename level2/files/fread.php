<?php
    $myFile = fopen('data.txt', 'r') or die('File can\'t be opened');
    echo '<p>File is opened successfully!</p>';
//    echo fread($myFile, 5) . '<br>';
//    echo fread($myFile, 3);
//    echo fread($myFile, 1024);
    // OR
    echo fpassthru($myFile);
    // OR
    echo fread($myFile, filesize('data.txt'));
    
    fclose($myFile);
    
    readfile('data.txt');
    echo '<p>File has been closed successfully!</p>';
