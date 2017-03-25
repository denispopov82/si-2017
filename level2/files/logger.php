<?php
// define constants
define("DEBUG", 'DEBUG');
define("ERROR", 'ERROR');

// define functions
function fileOpen($filename, $mode)
{
    $resource = fopen($filename, $mode) or die('File can not be opened!');
    
    return $resource;
}

function fileClose($resource)
{
    if (!is_resource($resource)) {
        die('File can not be closed!');
    }
    
    fclose($resource);
}

function formatMessage($level, $message)
{
    $message = '[' . date('Y-m-d H:i:s') . '] ' . '[' . $level . '] ' . $message . PHP_EOL;
    
    return $message;
}

function writeLog($resource, $message)
{
    if (!is_resource($resource)) {
        die('Log can not be written');
    }
    
    fwrite($resource, $message);
}

function logger($level, $message)
{
    $fileLog = 'log.txt';
    $mode = 'a';
    
    $resource = fileOpen($fileLog, $mode);
    $message = formatMessage($level, $message);
    writeLog($resource, $message);
    fileClose($resource);
}

echo '---- Start log ----<br />';

logger(DEBUG, 'Test debug message');
logger(ERROR, 'Test error message');

echo '---- End log ----';

// call logger

// ob_implicit_flush(1);
// ob_flush(); sleep(1);



















