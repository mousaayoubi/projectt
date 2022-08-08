<?php declare(strict_types=1);

namespace Testlicious\Test\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class TestObserver implements ObserverInterface
{

private $logger;

public function __construct(LoggerInterface $logger){

$this->logger = $logger;

}

public function execute(Observer $observer){

$message = $observer->getData('message');

return $this->logger->notice($message);

}
}
