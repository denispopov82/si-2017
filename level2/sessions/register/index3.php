<?php
session_start();
echo $_SESSION['username'].", вы пришли на другую страницу этого сайта!";
?>
<p><a href="index4.php">Уничтожить сессию</a></p>