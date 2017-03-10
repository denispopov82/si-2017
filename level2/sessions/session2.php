<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 03.03.2017
 * Time: 23:09
 */
session_start();

$name = $_SESSION['name'];
$age = $_SESSION['age'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Demo session</h1>
<a href="session1.php">Demonstrate session work</a><br />
<a href="session_destroy.php">Destroy session</a><br />
<?php if (!empty($name) && !empty($age)): ?>
    <p><strong>Hello, <?php echo $name ?></strong></p>
    <p><strong>your age is <?php echo $age ?></strong></p>
<?php endif; ?>
</body>
</html>