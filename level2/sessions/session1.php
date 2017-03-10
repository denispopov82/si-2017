<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 03.03.2017
 * Time: 23:09
 */
session_start();

if (!empty($_POST)) {
    $name = strip_tags(trim($_POST['name']));
    $age = (int)$_POST['age'];
    $_SESSION['name'] = $name;
    $_SESSION['age'] = $age;
} else {
    $name = !empty($_SESSION['name']) ? $_SESSION['name'] : '';
    $age = !empty($_SESSION['age']) ? $_SESSION['age'] : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Demo session</h1>
    <a href="session2.php">Demonstrate session work</a><br />
    <a href="session_destroy.php">Destroy session</a><br /><br />
    <?php if (!empty($name) && !empty($age)): ?>
        <p><strong>Hello, <?php echo $name ?></strong></p>
        <p><strong>your age is <?php echo $age ?></strong></p>
    <?php endif; ?>
    <div>
        <form action="session1.php" method="post">
            Your name: <input name="name" type="text" value="" /><br />
            Your age: <input name="age" type="text" value="" /><br />
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
