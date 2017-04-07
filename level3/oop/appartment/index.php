<?php
require_once 'House.php';
require_once 'HouseStatistics.php';

$house = new House(9);
$house->build();
$houseStatistics = new HouseStatistics();
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
                <?php echo $houseStatistics->getRoomApartmentsSquare(OneRoomApartment::ROOMS_AMOUNT) ?>
                (<?php echo $houseStatistics->getRoomApartmentsSquare(OneRoomApartment::ROOMS_AMOUNT, true) ?>)
            </td>
        </tr>
        <tr>
            <td>Двухкомнатных: </td>
            <td>
                <?php echo $houseStatistics->getRoomApartmentsSquare(TwoRoomApartment::ROOMS_AMOUNT) ?>
                (<?php echo $houseStatistics->getRoomApartmentsSquare(TwoRoomApartment::ROOMS_AMOUNT, true) ?>)
            </td>
        </tr>
        <tr>
            <td>Трехкомнатных: </td>
            <td>
                <?php echo $houseStatistics->getRoomApartmentsSquare(ThreeRoomApartment::ROOMS_AMOUNT) ?>
                (<?php echo $houseStatistics->getRoomApartmentsSquare(ThreeRoomApartment::ROOMS_AMOUNT, true) ?>)
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
                Балконов: <?php echo (OneRoomApartment::hasBalcony() ? OneRoomApartment::getBalconiesAmount() : '-') ?><br />
                Лоджий: <?php echo (OneRoomApartment::hasLoggia() ? OneRoomApartment::getLoggiasAmount() : '-') ?><br />
            </td>
        </tr>
        <tr>
            <td>В двухкомнатных: </td>
            <td>
                Балконов: <?php echo (TwoRoomApartment::hasBalcony() ? TwoRoomApartment::getBalconiesAmount() : '-') ?><br />
                Лоджий: <?php echo (TwoRoomApartment::hasLoggia() ? TwoRoomApartment::getLoggiasAmount() : '-') ?><br />
            </td>
        </tr>
        <tr>
            <td>В трехкомнатных: </td>
            <td>
                Балконов: <?php echo (ThreeRoomApartment::hasBalcony() ? ThreeRoomApartment::getBalconiesAmount() : '-') ?><br />
                Лоджий: <?php echo (ThreeRoomApartment::hasLoggia() ? ThreeRoomApartment::getLoggiasAmount() : '-') ?><br />
            </td>
        </tr>
    </table>
</body>
</html>
