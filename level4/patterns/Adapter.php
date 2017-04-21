<?php

class NotificationManager
{
    public function sendNotification($type = '', $data)
    {
        switch ($type) {
            case "email":
                $notification = new EmailService();
                $notification->setTo($data['to']);
                $notification->setFrom($data['from']);
                $notification->setTitle($data['title']);
                $notification->setMessage($data['message']);
                $notification->sendEmail();
                break;
            case "twitter":
                $notification = new TwitterService($data);
                $notification->setMessage($data['message']);
                $notification->sendTweet();
                break;
            case "sms":
                $notification = new SmsService($data);
                $notification->setRecipient($data['recipient']);
                $notification->setMessage($data['message']);
                $notification->sendText();
                break;
            default:
                break;
        }
    }
}

interface NotificationService
{
    public function setParams($params);
    public function getParams();
    public function send();
}

class TwitterAdapter implements NotificationService
{
    private $params = [];
    
    public function setParams($params)
    {
        $this->params = $params;
        
        return $this;
    }
    
    public function getParams()
    {
        return $this->params;
    }
    
    public function send()
    {
        echo 'Send twitter message';
//        $notification = new TwitterService($this->getParams());
//        $notification->setMessage($this->getParams()['message']);
//        $notification->sendTweet();
    }
}
$twitterAdapter = new TwitterAdapter();
//$twitterAdapter
//    ->setParams(['message' => 'test message'])
//    ->send();

class EmailAdapter implements NotificationService
{
    private $params = [];
    
    public function setParams($params)
    {
        $this->params = $params;
        
        return $this;
    }
    
    public function getParams()
    {
        return $this->params;
    }
    
    public function send()
    {
        echo 'Send email message';
//        $notification = new EmailService();
//        $notification->setTo($this->getParams()['to']);
//        $notification->setFrom($this->getParams()['from']);
//        $notification->setTitle($this->getParams()['title']);
//        $notification->setMessage($this->getParams()['message']);
//        $notification->sendEmail();
    }
}
$emailAdapter = new EmailAdapter();
$params = [
    'to' => '',
    'from' => '',
    'title' => '',
    'message' => 'test message',
];
//$emailAdapter
//    ->setParams($params)
//    ->send();

class SmsAdapter implements NotificationService
{
    private $params = [];
    
    public function setParams($params)
    {
        $this->params = $params;
        
        return $this;
    }
    
    public function getParams()
    {
        return $this->params;
    }
    
    public function send()
    {
        echo 'Send sms message';
//        $notification = new SmsService($this->getParams());
//        $notification->setRecipient($this->getParams()['recipient']);
//        $notification->setMessage($this->getParams()['message']);
//        $notification->sendText();
    }
}
$smsAdapter = new SmsAdapter();
$params = [
    'recipient' => '',
    'message' => 'test message',
];
//$smsAdapter
//    ->setParams($params)
//    ->send();


class AdapterFactory
{
    public function getAdapter($type)
    {
        $adapter = null;
        switch ($type) {
            case 'twitter':
                $adapter = new TwitterAdapter();
                break;
            case 'email':
                $adapter = new EmailAdapter();
                break;
            case 'sms':
                $adapter = new SmsAdapter();
                break;
            default:
                throw new Exception('Unknown atapter type.');
                break;
        }
        
        return $adapter;
    }
}
$adapterFactory = new AdapterFactory();

// twitter
$adapter = $adapterFactory->getAdapter('twitter');
$adapter->setParams(['message' => 'test message']);
$adapters['twitter'] = $adapter;

// email
$adapter = $adapterFactory->getAdapter('email');
$params = [
    'to' => '',
    'from' => '',
    'title' => '',
    'message' => 'test message',
];
$adapter->setParams($params);
$adapters['email'] = $adapter;

// sms
$adapter = $adapterFactory->getAdapter('sms');
$params = [
    'recipient' => '',
    'message' => 'test message',
];
$adapter->setParams($params);
$adapters['sms'] = $adapter;


// iterate adapters
/**
 * @var $adapter NotificationService
 */
foreach ($adapters as $type => $adapter) {
    $adapter->send();
    echo '<br />';
}
