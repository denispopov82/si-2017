<?php
abstract class AbstractMailer
{
    abstract public function sendEmail();
}

class GmailMailer extends AbstractMailer
{
    public function sendEmail()
    {
        // TODO: Implement sendEmail() method.
    }
}

class YandexMailer extends AbstractMailer
{
    public function sendEmail()
    {
        // TODO: Implement sendEmail() method.
    }
}

class FactoryMailer
{
    public function getMailer($type)
    {
        $mailer = null;
        switch ($type) {
            case 'gmail':
                $mailer = new GmailMailer();
                break;
            case 'yandex':
                $mailer = new YandexMailer();
                break;
            default:
                throw new Exception('Mailer type does not exist.');
                break;
        }
        
        return $mailer;
    }
}

$factoryMailer = new FactoryMailer();
$mailer = $factoryMailer->getMailer('gmail');
$mailer->sendEmail();

$mailer = $factoryMailer->getMailer('yandex');
$mailer->sendEmail();

$mailer = $factoryMailer->getMailer('yachoo');
$mailer->sendEmail();
