<?php

declare(strict_types=1);

namespace Test9\Test9\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;

class LogAddToCart implements ObserverInterface
{
	protected $logger;
	public function __construct(
		LoggerInterface $logger
	){
	$this->logger = $logger;
	}

	public function execute(Observer $observer)
	{
	$quoteItem = $observer->getEvent()->getQuoteItem();

	$product = $observer->getEvent()->getProduct();

	if (!$quoteItem && !$product){
		$this->logger->warning('[CartLogger] Add to cart event fired but no quoteItem/product found');
		return;
	}
	
	$qty = $quoteItem ? (float) $quoteItem->getQty() : null;

	$sku = $product ? $product->getSku() : ($quoteItem ? $quoteItem->getSku() : null);

	$name = $product ? $product->getName() : ($quoteItem ? $quoteItem->getName() : null);

	$this->logger->info('[CartLogger] Item Added to cart', [
		'sku' => $sku,
		'name' => $name,
		'qty' => $qty,
	]);
	}
}
