<?php
require_once 'HouseStatistics.php';
require_once 'House.php';

$house = new House(9);
$house->build();

$statistics = new HouseStatistics();
$statistics->setHouse($house);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table width="100%" border="1">
    <tr>
        <th colspan="2">Многоэтажный дом</th>
    </tr>
    <tr>
        <td>Количество этажей:</td>
        <td><?php echo $statistics->getStoreysAmout() ?></td>
    </tr>
    <tr>
        <td>Количество квартир в доме:</td>
        <td><?php echo $statistics->getApartmentsAmount() ?></td>
    </tr>
    <tr>
        <td>Однокомнатных:</td>
        <td><?php echo $statistics->getOneRoomApartmentsAmount() ?></td>
    </tr>
    <tr>
        <td>Двухкомнатных:</td>
        <td><?php echo $statistics->getTwoRoomApartmentsAmount() ?></td>
    </tr>
    <tr>
        <td>Трехкомнатных:</td>
        <td><?php echo $statistics->getThreeRoomApartmentsAmount() ?></td>
    </tr>
</table>
</body>
</html>
