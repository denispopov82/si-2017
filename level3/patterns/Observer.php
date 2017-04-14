<?php

/**
 * Обьект, называемый подчиненный, управляет списком зависимостей, называемых наблюдателями и
 * уведомляет их автоматически о любых изменениях состояния, обычно вызывая один из их методов.
 *
 * ${CLASS_NAME}
 *
 * @package   ${PARAM_DOC}
 */
interface IObserver
{
    public function addCurrency(Currency $currency);
}

class priceSimulator implements IObserver
{
    private $currencies;
    
    public function __construct()
    {
        $this->currencies = array();
    }
    
    public function addCurrency(Currency $currency)
    {
        $this->currencies[] = $currency;
    }
    
    public function updatePrice()
    {
        foreach ($this->currencies as $currency) {
            $currency->update();
        }
    }
}

interface Currency
{
    public function update();
    
    public function getPrice();
}

class Pound implements Currency
{
    private $price;
    
    public function __construct($price)
    {
        $this->price = $price;
        echo "<p>Pound Original Price: {$price}</p>";
    }
    
    public function update()
    {
        $this->price = $this->getPrice();
        echo "<p>Pound Updated Price : {$this->price}</p>";
    }
    
    public function getPrice()
    {
        return number_format(mt_rand() / mt_getrandmax() * (0.71 - 0.65), 3);
    }
}

class Yen implements Currency
{
    private $price;
    
    public function __construct($price)
    {
        $this->price = $price;
        echo "<p>Yen Original Price : {$price}</p>";
    }
    
    public function update()
    {
        $this->price = $this->getPrice();
        echo "<p>Yen Updated Price : {$this->price}</p>";
    }
    
    public function getPrice()
    {
        return mt_rand(120.52, 122.50);
    }
}

$priceSimulator = new priceSimulator();

$currency1 = new Pound(0.60);
$currency2 = new Yen(122);

$priceSimulator->addCurrency($currency1);
$priceSimulator->addCurrency($currency2);

echo "<hr />";
$priceSimulator->updatePrice();

echo "<hr />";
$priceSimulator->updatePrice();

echo "<hr />";
$priceSimulator->updatePrice();
