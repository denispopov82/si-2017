<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 03.03.2017
 * Time: 23:09
 */
session_start();

require_once 'logger.php';

if (!empty($_POST)) {
    $name = strip_tags(trim($_POST['name']));
    $_SESSION['name'] = $name;
    
    setDebug($name . ' has visited the site');
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    $name = !empty($_SESSION['name']) ? $_SESSION['name'] : '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if (!empty($name)): ?>
    <p><strong>Hello, <?php echo $name ?></strong></p>
    <p>
        <a href="visitor_logout.php">Logout</a>
    </p>
<?php else: ?>
<div>
    <form action="visitor.php" method="post">
        Your name: <input name="name" type="text" value=""/><br/>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
<?php endif; ?>
</body>
</html>
