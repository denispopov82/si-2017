<?php
session_start();

include 'logger.php';

// create html form
// set name to session
if (!empty($_POST)) {
    $username = isset($_POST['username']) ? strip_tags(trim($_POST['username'])) : '';
    $_SESSION['username'] = $username;
    
    logger(DEBUG, $username . ' has visited the site');

    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
}
// log username to log
// display username from session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if (!empty($username)): ?>
    <p><?php echo $username ?></p>
    <p>
        <a href="visitor_logout.php">Logout</a>
    </p>
<?php else: ?>
<form action="visitor.php" method="post">
    Username: <input type="text" name="username" value="" /><br >
    <input type="submit" value="Send">
</form>
<?php endif; ?>
</body>
</html>

