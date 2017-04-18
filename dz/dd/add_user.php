<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>New  User</h3>
<form action="new_user_handler.php" method="post">
    <table width="70%" border="1">
        <tr>
            <td>
                <label>
                    Username:
                    <input type="text" name="username" value=""/>
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <label>
                    Email:
                    <input type="text" name="email" value=""/>
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Save user">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
