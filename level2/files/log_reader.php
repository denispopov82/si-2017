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

function logReader($resource)
{
    $logs = [];
    while ($line = fgets($resource)) {
        $logs[] = $line;
    }
    
    return $logs;
}

function getLogs()
{
    $logfile = 'log.txt';
    $mode = 'r';
    
    $resource = openFile($logfile, $mode);
    $logs = logReader($resource);
    closeFile($resource);
    
    return $logs;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php foreach (getLogs() as $log) : ?>
    <p><?php echo $log ?></p>
<?php endforeach; ?>
</body>
</html>
