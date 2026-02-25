<?php

declare(strict_types=1);

namespace Test8\Test8\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;

class LogOrderPlaceAfter implements ObserverInterface
{
	protected $logger;

	public function __construct(LoggerInterface $logger)
	{
	$this->logger = $logger;
	}

	public function execute(Observer $observer)
	{
	$order = $observer->getEvent()->getOrder();

	if (!$order) {
	$this->logger->warning('[OrderLogger] sales_order_place_after fired, but no order found.');
	return;
	}
	
	$this->logger->info('[OrderLogger] Order placed', [
		'increment_id' => $order->getIncrementId(),
		'customer' => $order->getCustomerEmail() ?: 'guest',
		'grand_total' => (float) $order->getGrandTotal(),
		'store_id' => (int) $order->getStoreId(),
	]);
	}
}
