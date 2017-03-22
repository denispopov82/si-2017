<?php
function fileOpen($file, $mode)
{
    if (empty($file) || empty($mode)) {
        die('File name or mode is empty!');
    }
    
    $resource = fopen($file, $mode) or die('File can not be opened!');
    
    return $resource;
}

function formatMessage($level, $message)
{
    $message = '[' . date('Y-m-d H:i:s') . '] ' . '[' . $level . '] ' . $message . PHP_EOL;
    
    return $message;
}

function writeLog($resource, $message)
{
    if (!is_resource($resource)) {
        die('Description is not correct!');
    }
    
    fwrite($resource, $message);
    
    return true;
}

function fileClose($resource)
{
    if (!is_resource($resource)) {
        die('Description is not correct!');
    }
    
    fclose($resource);
}

/**
 * @param string $level Level of message: DEBUG, NOTICE, ERROR, WARNING
 * @param $message
 */
function logger($level, $message)
{
    // define file and mode
    $logFile = 'log.txt';
    $mode = 'a';
    
    // open file
    $resource = fileOpen($logFile, $mode);
    // format message: [data] [level] message
    $message = formatMessage($level, $message);
    // write log
    writeLog($resource, $message);
    // close file
    fileClose($resource);
}

//define('DEBUG', 'DEBUG');
//define('NOTICE', 'NOTICE');
//define('WARNING', 'WARNING');
//define('ERROR', 'ERROR');
//
//$time = 1;
//
//ob_implicit_flush(1);
//
//echo '----- Start writing log -----<br />';
//ob_flush();
//sleep($time);
//
//logger(DEBUG, 'Test debug message');
//echo 'Debug log has been written successfully!<br />';
//ob_flush();
//sleep($time);
//
//logger(NOTICE, 'Test notice message');
//echo 'Notice log has been written successfully!<br />';
//ob_flush();
//sleep($time);
//
//logger(WARNING, 'Test warning message');
//echo 'Warning log has been written successfully!<br />';
//ob_flush();
//sleep($time);
//
//logger(ERROR, 'Test error message');
//echo 'Error log has been written successfully!<br />';
//ob_flush();
//sleep($time);
//
//echo '----- End writing log -----';
