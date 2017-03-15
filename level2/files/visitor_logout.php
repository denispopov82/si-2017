<?php
session_start();

require_once 'logger.php';

if (isset($_SESSION['name'])) {
    setDebug($_SESSION['name'] . ' has leaved the site');
    
    unset($_SESSION['name']);
}

session_destroy();

header('Location: http://test.loc:8080/files/visitor.php');
