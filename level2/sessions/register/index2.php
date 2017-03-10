<?php
session_start();
$_SESSION['username'] = $_POST['name'];
echo "Привет, ".$_SESSION['username']."<br>";
?>
<p><a href="index3.php">На следующую страницу</a></p>