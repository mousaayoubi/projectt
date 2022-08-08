<?php declare(strict_types=1);

namespace Macademy\BlogExtra\Plugin;

use Macademy\Blog\Observer\PostObserver;
use Magento\Framework\Event\Observer;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class AddDateTimeToLog
{
private $timezone;

public function __construct(TimezoneInterface $timezone){

$this->timezone = $timezone;

}

public function beforeExecute(PostObserver $subject, Observer $observer){

$request = $observer->getData('request');

$request->setParams(['datetime', $this->timezone->date()]);

return([$observer]);

}
}
