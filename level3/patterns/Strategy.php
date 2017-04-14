<?php
/**
 * Когда выполняется одна и та же задача, но разными способами - используется Strategy.
 *
 * Совершаются платежи.
 * Если платеж >= 500, то оплата производится с помощью PayPal.
 * Если платеж < 500, то оплата производится с помощью кредитной карты.
 *
 * @package   ${PARAM_DOC}
 */
// case 1.
//class PayByCC1
//{
//    public function pay($amount)
//    {
//        echo 'Paying ' . $amount . ' by credit card';
//    }
//}
//
//class PayByPayPal1
//{
//    public function pay($amount)
//    {
//        echo 'Paying ' . $amount . ' by PayPal';
//    }
//}

//$amount = 3000;
//if ($amount >= 500) {
//    $pay = new PayByPayPal1();
//    $pay->pay($amount);
//} else {
//    $pay = new PayByCC1();
//    $pay->pay($amount);
//}

// case 2.
interface IPayStrategy
{
    public function pay($amount);
}

class PayByCC implements IPayStrategy
{
    public function pay($amount)
    {
        echo 'Paying ' . $amount . ' by credit card <br />';
    }
}

class PayByPayPal implements IPayStrategy
{
    public function pay($amount)
    {
        echo 'Paying ' . $amount . ' by PayPal <br />';
    }
}

class PayByYandexMoney implements IPayStrategy
{
    public function pay($amount)
    {
        echo 'Paying ' . $amount . ' by Yandex Money <br />';
    }
}

class Strategy
{
    private $amount = 0;
    
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
    
    public function payAmount()
    {
        if ($this->amount >= 500 && $this->amount < 1000) {
            $pay = new PayByPayPal();
        } elseif ($this->amount >= 1000) {
            $pay = new PayByYandexMoney();
        } else {
            $pay = new PayByCC();
        }
        $pay->pay($this->amount);
    }
}

$strategy = new Strategy();
$strategy->setAmount(499);
$strategy->payAmount();

$strategy->setAmount(501);
$strategy->payAmount();

$strategy->setAmount(2000);
$strategy->payAmount();
