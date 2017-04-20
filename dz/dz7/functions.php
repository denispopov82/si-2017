<?php
function my_setcookie($name, $value = null, $expire = null)
{
    $name = strip_tags(trim($name));
    $value = strip_tags(trim($value));
    $expire = (int) $expire;
    
    setcookie($name, $value, $expire);
}

function my_delete_cookie($name)
{
    setcookie($name, '');
}

function my_update_cookie($name, $value = null, $expire = null)
{
    if (isset($_COOKIE[$name])) {
        my_setcookie($name, $value, $expire);
    }
}
