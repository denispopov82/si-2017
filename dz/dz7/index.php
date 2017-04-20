<?php
include_once 'functions.php';

$userBirthday = 0;
if (!empty($_GET)) {
    $username = strip_tags(trim($_GET['username']));
    $phone = $_GET['phone'];
    $birthday = strip_tags(trim($_GET['birthday']));
    
    if (empty($username)) {
        echo 'Enter username value';
        echo '<br>';
    } else {
        setcookie('username', $username, time() + 3600);
    }
    
    if (empty($phone)) {
        echo 'Enter phone value';
        echo '<br>';
    } else {
        my_setcookie('phone', $phone, time() + 3600);
    }
    
    if (!empty($birthday)) {
        $birthday = strtotime($birthday);
        $month = date('m', $birthday);
        $day = date('d', $birthday);
        
        $userBirthdayTs = mktime(0, 0, 0, $month, $day);
        $today = time();
        $userBirthday = $today - $userBirthdayTs;
        
        if ($userBirthday < 0) {
            $userBirthday *= -1;
        }
    
        $userBirthday = floor(($userBirthday / 3600) / 24);
    }
}

setcookie('age', mt_rand(10, 70), (time() + 3600) * 3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <p>
        <a href="hello.php">Go to hello</a>
    </p>
    <p>
        Till you birthday <?php echo $userBirthday ?> is left.
    </p>
    <div>
        <form action="index.php" method="GET">
            <div>
                <label>Username:
                    <input type="text" name="username">
                </label>
            </div>
            <div>
                <label>Phone:
                    <input type="text" maxlength="5" name="phone">
                </label>
            </div>
            <div>
                <label>Birthday:
                    <input type="text" name="birthday">
                </label>
            </div>
            <input type="submit" value="Send">
        </form>
    </div>
</body>
</html>

