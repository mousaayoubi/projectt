<?php

declare(strict_types=1);

namespace Test7\Test7\Plugin;

use Magento\Quote\Api\CartManagementInterface;
use Psr\Log\LoggerInterface;

class CustomCheckoutPlugin
{
	protected $logger;

	public function __construct(
		LoggerInterface $logger
	) {
		$this->logger = $logger;
	}
	
	public function afterPlaceOrder(CartManagementInterface $subject, $result, $cartId)
	{
		$this->logger->info(
			'Order placed successfully',
			[
				'order_id' => $result,
				'cart_id' => $cartId,
				'timestamp' => date('Y-m-d H:i:s')
			]
		);

		return $result;
	}
}
