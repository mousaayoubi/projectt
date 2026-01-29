<?php

declare(strict_types=1);

namespace SwiftOtter\GroupShippingPolicyGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use SwiftOtter\GroupShippingPolicyGraphQl\Model\Resolver\DataProvider\ShippingPolicies as ShippingPoliciesProvider;

class ShippingPolicies implements ResolverInterface
{
	private ShippingPoliciesProvider $policiesProvider;
	public function __construct(ShippingPoliciesProvider $policiesProvider)
	{
$this->policiesProvider = $policiesProvider;
	}
	public function resolve(
			Field $field,
                        $context,
                        ResolveInfo $info,
                        ?array $value = null,
                        ?array $args = null
)
	{
		$includeAll = $args['all'] ?? true;
		
		if ($includeAll){
return $this->policiesProvider->getAllPolicies();
		} else {

			$contextExts = $context->getExtensionAttributes();
			$customerGroupId = $contextExts->getCustomerGroupId();
			if ($customerGroupId !== null) {

				$customerGroupId = (int) $customerGroupId;
			}

			return [$this->policiesProvider->getCustomerGroupPolicy($customerGroupId)];
		}
	}

}
