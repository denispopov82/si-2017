<?php
include_once 'Apartment.php';
include_once 'IBalcony.php';
include_once 'ILoggia.php';
include_once 'OneRoomApartment.php';
include_once 'TwoRoomApartment.php';
include_once 'ThreeRoomApartment.php';
include_once 'FourRoomApartment.php';

class House
{
    /**
     * @var int
     */
    private $storeyNumber;
    
    /**
     * @var array
     */
    private $storeys = [];
    
    /**
     * House constructor.
     *
     * @param $storeyNumber
     */
    public function __construct($storeyNumber)
    {
        $this->storeyNumber = $storeyNumber;
    }
    
    protected function setStorey($storey, $apartments)
    {
        $this->storeys[$storey] = $apartments;
    }
    
    public function build()
    {
        for ($i = 1; $i <= $this->storeyNumber; $i++) {
            $apartments = [
                new OneRoomApartment(),
                new OneRoomApartment(),
                new TwoRoomApartment(),
                new TwoRoomApartment(),
                new ThreeRoomApartment(),
                new FourRoomApartment(),
            ];
            $this->setStorey($i, $apartments);
        }
    }
    
    public function displayHouse()
    {
        printf('This is %d-storey house.<br />', $this->storeyNumber);
        echo '<br />';
        $countStoreys = count($this->storeys);
        for ($storey = 1; $storey <= $countStoreys; $storey++) {
            printf('This is %d storey.<br />', $storey);
            foreach ($this->storeys[$storey] as $apartment) {
                /**
                 * @var OneRoomApartment|TwoRoomApartment|ThreeRoomApartment $apartment
                 */
                printf('This is %d-room apartment. ', $apartment->getRooms());
    
                if ($apartment->hasBalcony()) {
                    printf('Apartment has %d balcony.', $apartment->getBalconies());
                }
                if ($apartment->hasLoggias()) {
                    printf('Apartment has %d loggias.', $apartment->getLoggias());
                }
                echo '<br />';
            }
            echo '<br />';
            echo '<br />';
        }
    }
}

$house = new House(9);
$house->build();
$house->displayHouse();
