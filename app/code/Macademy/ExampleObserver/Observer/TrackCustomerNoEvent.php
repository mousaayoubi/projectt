<?php

namespace Macademy\ExampleObserver\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class TrackCustomerNoEvent implements ObserverInterface
{
public function execute(Observer $observer)
{
$eventData = $observer->getData('customer_no');

echo 'This is the customer number event data:'.'<br />';
echo '<pre>';
var_dump($eventData);

return $eventData;
}
}
