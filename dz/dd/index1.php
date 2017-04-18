<?php
/**
 * 1.
 */
abstract class PaidService
{
    /**
     * @var string
     */
    private $id;
    
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var float
     */
    private $cost;
    
    public function __construct($id, $name, $cost)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setCost($cost);
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }
    
    /**
     * @param float $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }
    
    abstract public function calculateAverageMonthlyCosts();
}

class FixedMonthlyCostPaidService extends PaidService
{
    /**
     * среднемесячные затраты = costs.
     */
    public function calculateAverageMonthlyCosts()
    {
        return $this->getCost();
    }
}

class FixedHourlyCostPaidService extends PaidService
{
    /**
     * среднемесячные затраты = 30 * 24 * costs.
     */
    public function calculateAverageMonthlyCosts()
    {
        return 30 * 24 * $this->getCost();
    }
}

$services = [
    new FixedHourlyCostPaidService('service1', 'Google Orkut', 11),
    new FixedHourlyCostPaidService('service2', 'Google Voice', 9.4),
    new FixedMonthlyCostPaidService('service5', 'YouTube', 8064),
    new FixedHourlyCostPaidService('service8', 'YouTube', 11.2),
    new FixedHourlyCostPaidService('service3', 'Mandrill', 11.2),
    new FixedHourlyCostPaidService('service4', 'Google Finance', 7.8),
    new FixedMonthlyCostPaidService('service7', 'Google Building Maker', 5347),
    new FixedMonthlyCostPaidService('service6', 'LinkedIn', 6863)
];

function compareServices(PaidService $service1, PaidService $service2)
{
    if ($service1->calculateAverageMonthlyCosts() == $service2->calculateAverageMonthlyCosts()) {
        return ($service1->getName() < $service2->getName()) ? -1 : 1;
    }
    
    return ($service1->calculateAverageMonthlyCosts() > $service2->calculateAverageMonthlyCosts()) ? -1 : 1;
}

usort($services, "compareServices");

/**
 * @var $service PaidService
 */
foreach ($services as $key => $service) {
    printf(
        '%s / %s / %d <br />',
        $service->getId(),
        $service->getName(),
        $service->calculateAverageMonthlyCosts()
    );
}
