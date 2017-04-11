<?php
require_once 'House.php';
require_once 'HouseStatistics.php';

$house = new House1(9);
$house->build();
$houseStatistics = new HouseStatistics1();
$houseStatistics->setHouse($house);
$houseStatistics->collectRoomsApartmentAmount();
$houseStatistics->collectApartmentSquare();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <table width="50%" border="1" style="text-align: center" align="center">
        <tr>
            <th colspan="2">Многоэтажный дом</th>
        </tr>
        <tr>
            <td width="60%">Количество этажей:</td>
            <td width="40%"><?php echo $houseStatistics->getStoreysAmout() ?></td>
        </tr>

        <tr>
            <td colspan="2">Площадь квартир </td>
        </tr>
        <tr>
            <td>Общаяя площадь квартир:</td>
            <td><?php echo $houseStatistics->getAllApartmentsSquare() ?></td>
        </tr>
        <tr>
            <td>Однокомнатных: </td>
            <td>
                <?php echo $houseStatistics->getRoomApartmentsSquare(OneRoomApartment1::ROOMS_AMOUNT) ?>
                (<?php echo $houseStatistics->getRoomApartmentsSquare(OneRoomApartment1::ROOMS_AMOUNT, true) ?>)
            </td>
        </tr>
        <tr>
            <td>Двухкомнатных: </td>
            <td>
                <?php echo $houseStatistics->getRoomApartmentsSquare(TwoRoomApartment1::ROOMS_AMOUNT) ?>
                (<?php echo $houseStatistics->getRoomApartmentsSquare(TwoRoomApartment1::ROOMS_AMOUNT, true) ?>)
            </td>
        </tr>
        <tr>
            <td>Трехкомнатных: </td>
            <td>
                <?php echo $houseStatistics->getRoomApartmentsSquare(ThreeRoomApartment1::ROOMS_AMOUNT) ?>
                (<?php echo $houseStatistics->getRoomApartmentsSquare(ThreeRoomApartment1::ROOMS_AMOUNT, true) ?>)
            </td>
        </tr>
        
        <tr>
            <td>Количество квартир в доме: </td>
            <td><?php echo $houseStatistics->getAllApartmentsAmout() ?></td>
        </tr>
        <tr>
            <td>Однокомнатных: </td>
            <td><?php echo $houseStatistics->getOneRoomApartmentsAmout() ?></td>
        </tr>
        <tr>
            <td>Двухкомнатных: </td>
            <td><?php echo $houseStatistics->getTwoRoomApartmentsAmout() ?></td>
        </tr>
        <tr>
            <td>Трехкомнатных: </td>
            <td><?php echo $houseStatistics->getThreeRoomApartmentsAmout() ?></td>
        </tr>

        
        <tr>
            <td colspan="2">Балконы и лоджии: </td>
        </tr>
        <tr>
            <td>В однокомнатных: </td>
            <td>
                Балконов: <?php echo (OneRoomApartment1::hasBalcony() ? OneRoomApartment1::getBalconiesAmount() : '-') ?><br />
                Лоджий: <?php echo (OneRoomApartment1::hasLoggia() ? OneRoomApartment1::getLoggiasAmount() : '-') ?><br />
            </td>
        </tr>
        <tr>
            <td>В двухкомнатных: </td>
            <td>
                Балконов: <?php echo (TwoRoomApartment1::hasBalcony() ? TwoRoomApartment1::getBalconiesAmount() : '-') ?><br />
                Лоджий: <?php echo (TwoRoomApartment1::hasLoggia() ? TwoRoomApartment1::getLoggiasAmount() : '-') ?><br />
            </td>
        </tr>
        <tr>
            <td>В трехкомнатных: </td>
            <td>
                Балконов: <?php echo (ThreeRoomApartment1::hasBalcony() ? ThreeRoomApartment1::getBalconiesAmount() : '-') ?><br />
                Лоджий: <?php echo (ThreeRoomApartment1::hasLoggia() ? ThreeRoomApartment1::getLoggiasAmount() : '-') ?><br />
            </td>
        </tr>
    </table>
</body>
</html>
