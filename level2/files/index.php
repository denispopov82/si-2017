<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style type="text/css">
        ul {
            float: left;
            width: 100%;
            margin: 0 0 25px 0;
            padding: 0;
        }
        ul li {
            float: left;
            margin-left: 25px;
        }
        ul li:first-child {
            margin: 0;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="index.php?id=fopen">fopen</a></li>
        <li><a href="index.php?id=fread">fread</a></li>
        <li><a href="index.php?id=fgets">fgets</a></li>
        <li><a href="index.php?id=fgetss">fgetss</a></li>
        <li><a href="index.php?id=fgetc">fgetc</a></li>
        <li><a href="index.php?id=fputs">fputs</a></li>
        <li><a href="index.php?id=feof">feof</a></li>
        <li><a href="index.php?id=readfile">readfile</a></li>
        <li><a href="index.php?id=file">file</a></li>
        <li><a href="index.php?id=file_get_contents">file_get_contents</a></li>
    </ul>
    <div style="float: left;width: 100%">
    <?php
    $id = isset($_GET['id']) ? strip_tags(trim($_GET['id'])) : '';
    if (!empty($id)) {
        require_once $id . '.php';
    }
    ?>
    </div>
</body>
</html>
