<?php
session_start();

include 'logger.php';

if (isset($_SESSION['username'])) {
    logger(DEBUG, $_SESSION['username'] . ' has leaved the site');
    
    unset($_SESSION['username']);
}

session_destroy();

header('Location: http://' . $_SERVER['HTTP_HOST'] . '/team/my/level2/files/visitor.php');
