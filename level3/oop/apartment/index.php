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
    <tr>
        <td>Балконы и лоджии:</td>
        <td></td>
    </tr>
    <tr>
        <td>Количество балконов: </td>
        <td>
            <?php echo $statistics->getBalconiesAmount() ?>
        </td>
    </tr>
    <tr>
        <td>Количество лоджий: </td>
        <td></td>
    </tr>
    <tr>
        <td>В однокомнатных:</td>
        <td>
            Балконы:
            <?php echo $statistics->getOneRoomBalconiesSingleAmount(); ?><br />
            Лоджии: <br />
        </td>
    </tr>
    <tr>
        <td>В двухкомнатных:</td>
        <td>
            Балконы:
            <?php echo $statistics->getTwoRoomBalconiesSingleAmount(); ?><br />
            Лоджии: <br />
        </td>
    </tr>
    <tr>
        <td>В трехкомнатных:</td>
        <td>
            Балконы:
            <?php echo $statistics->getThreeRoomBalconiesSingleAmount(); ?><br />
            Лоджии: <br />
        </td>
    </tr>
</table>
</body>
</html>
















