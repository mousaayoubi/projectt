<?php

declare(strict_types=1);

namespace SwiftOtter\GroupShippingPolicyGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\Graphql\Exception\GraphQlInputException;
use SwiftOtter\GroupShippingPolicyGraphQl\Model\Resolver\Service\CreateShippingPolicyCallback as CreateShippingPolicyCallbackService;

class CreateShippingPolicyCallback implements ResolverInterface
{

		private $createCallbackService;

		public function __construct(
		 CreateShippingPolicyCallbackService $createCallbackService
		)
	{

		$this->createCallbackService = $createCallbackService;
	}
	public function resolve(

		Field $field,
		$context,
		ResolveInfo $info,
		?array $value = null,
		?array $args = null
	) {

		if (!isset($args['phone'])) {

			throw new GraphQlInputException(__('Phone number is required'));
		}

		$phone = $args['phone'];
		$contextExt = $context->getExtensionAttributes();
		$customerGroupId = $contextExt->getCustomerGroupId();

		if ($customerGroupId !== null) {

			$customerGroupId = (int) $customerGroupId;
		}

		return $this->createCallbackService->execute($customerGroupId, $phone);
	}
}
