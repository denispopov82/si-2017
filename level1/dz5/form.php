<?php
function formatDate($date)
{
    $date = trim(strip_tags($date));
    
    $isValid = (bool)strtotime($date) && date("Y-m-d", strtotime($date)) === $date;
    
    return $isValid ? $date : false;
}

if (!empty($_POST)) {
    $date1 = !empty($_POST['date1']) ? formatDate($_POST['date1']) : '';
    $date2 = !empty($_POST['date2']) ? formatDate($_POST['date2']) : '';
    $format1 = !empty($_POST['format1']) ? trim(strip_tags($_POST['format1'])) : '';
    $format2 = !empty($_POST['format2']) ? trim(strip_tags($_POST['format2'])) : '';
    
    /**
     * 1. Пользователь вводит число, а скрипт определяет високосный ли год.
     * Сделать проверку на формат и количество введенных значений. Если есть ошибка - уведомить об этом пользователя.
     */
    if (!empty($date1)) {
        if ((date('Y', strtotime($date1)) % 4) == 0) {
            echo 'Year is leap!';
        } else {
            echo 'Year is not leap!';
        }
        echo '<br>';
    } else {
        echo 'Enter first date';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <form method="post">
        <table width="70%" border="1">
            <tr>
                <td>
                    <label>Date 1:
                        <input type="text" name="date1" value=""/>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Date 2:
                        <input type="text" name="date2" value=""/>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>dd.mm.YY:
                        <input type="radio" name="format1" value="dd.mm.YY"/>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>YY.mm.dd:
                        <input type="radio" name="format2" value="YY.mm.dd"/>
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
