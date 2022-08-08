<?php declare(strict_types=1);

namespace Macademy\Blog\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class PostObserver implements ObserverInterface
{
private $logger;

public function __construct(LoggerInterface $logger){

$this->logger = $logger;

}

public function execute(Observer $observer){

$request = $observer->getData('request');
$this->logger->info('Blog detail page viewed.', ['params' => $request->getParams()]);
}
}
