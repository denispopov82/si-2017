<?php

function openFile($file, $fileMode)
{
    $myFile = fopen($file, $fileMode) or die('File can\'t be opened');
    
    return $myFile;
}

function closeFile($resource)
{
    if (is_resource($resource)) {
        fclose($resource);
    }
}

function formatMessage($level, $message)
{
    $message = '[' . date('Y-m-d H:i:s') . '] [' . $level . '] ' . $message;
    
    return $message . PHP_EOL;
}

function write($resource, $message)
{
    $result = fwrite($resource, $message);
    if ($result === false) {
        echo('The file could not be written to.');
    }
}

function setError($message)
{
    logger('ERROR', $message);
}

function setWarning($message)
{
    logger('WARNING', $message);
}

function setNotice($message)
{
    logger('NOTICE', $message);
}

function setDebug($message)
{
    logger('DEBUG', $message);
}

function logger($level, $message)
{
    $file = 'log.txt';
    $fileMode = 'a+';
    
    $resource = openFile($file, $fileMode);
    $message = formatMessage($level, $message);
    write($resource, $message);
    
    closeFile($resource);
}

//setError(ERROR, 'Test error');
//setWarning(WARNING, 'Test warning');
//setNotice(NOTICE, 'Test notice');
//setDebug(DEBUG, 'Test defbug');
