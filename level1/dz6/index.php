<?php include_once "handler.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DZ-6</title>
</head>
<body>
    <form method="post" action="index.php">
        <table width="70%" border="1" align="center">
            <tr>
                <td>
                    <label>Date 1:
                        <input type="text" name="date1" value="" placeholder="YYYY-mm-dd">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Date 2:
                        <input type="text" name="date2" value="" placeholder="YYYY-mm-dd">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>dd.mm.YY:
                        <input type="radio" name="format" value="d.m.Y" checked="checked">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>YY.mm.dd:
                        <input type="radio" name="format" value="Y.m.d">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Send">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
