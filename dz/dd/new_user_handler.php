<?php
include_once 'User.php';

/**
 * ${CLASS_NAME}
 *
 * @package   ${PARAM_DOC}
 */
if (!empty($_POST)) {
    $username = isset($_POST['username']) ? strip_tags(trim($_POST['username'])) : '';
    $email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : '';
    
    $user = new User($username, $email);
    $user->save();
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
