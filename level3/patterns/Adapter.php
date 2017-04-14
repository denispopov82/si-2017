<?php
/**
 * ${CLASS_NAME}
 *
 * @package   ${PARAM_DOC}
 */
class PayPal
{
    public function __construct()
    {
        // your code here ...
    }
    
    public function sendPayment($amount) // -> payAmount
    {
        // Paying via PayPal
        echo 'Paying via PayPal: ' . $amount;
    }
}

$paypal = new PayPal();
$paypal->sendPayment('2629');

interface IPaymentAdapter
{
    public function pay($amount);
}

class PayPalAdapter implements IPaymentAdapter
{
    private $paypal;
    
    public function __construct(PayPal $payPal)
    {
        $this->paypal = $payPal;
    }
    
    public function pay($amount)
    {
        $this->paypal->sendPayment($amount);
//        $this->paypal->payAmount($amount);
    }
}

$paypal = new PayPalAdapter(new PayPal());
$paypal->pay('2629');
