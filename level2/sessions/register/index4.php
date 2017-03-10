<?php
session_start();
// разрегиструем переменную
unset($_SESSION['username']);
// теперь имя пользователя уже не выводится
echo "Привет, ".$_SESSION['username'];
// уничтожаем сессию
session_destroy();
?>
<p><a href="index.php">Создать новую сессию</a></p>
