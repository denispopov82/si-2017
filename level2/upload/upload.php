<?php
echo "<pre>";
    var_dump($_POST);
echo "</pre>";
echo "<pre>";
    var_dump($_FILES);
echo "</pre>";
echo ini_get('upload_max_filesize');
$tmp = $_FILES['filename']['tmp_name'];
$name = $_FILES['filename']['name'];
move_uploaded_file($tmp, '/var/www/test.loc/dir/' . $name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="upload.php" enctype="multipart/form-data">
    File: <input type="file" name="filename" /><br />
    <input type="submit" value="Send">
</form>
</body>
</html>
