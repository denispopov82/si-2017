<?php
class EmptyUsernameException extends Exception {}

class EmptyEmailException extends Exception {}

try {
    $username = '1';
    $email = '';
    
    if (empty($username)) {
        throw new EmptyUsernameException('Username is empty!');
    }
    if (empty($email)) {
        throw new EmptyEmailException('Email is empty!');
    }
} catch (EmptyUsernameException $e) {
    echo $e->getMessage();
} catch (EmptyEmailException $e) {
    echo $e->getMessage();
} finally {
    echo 'finally!';
}
