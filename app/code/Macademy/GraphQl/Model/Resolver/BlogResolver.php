<?php

declare(strict_types=1);

namespace Macademy\GraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class BlogResolver implements ResolverInterface {

	public function resolve(
		Field $field,
		$context,
		ResolveInfo $info,
		?array $value = null,
		?array $args = null
	): array
	{

		file_put_contents(
			BP.'/var/log/context_dump.log',
			print_r($context, true),
			FILE_APPEND
		);

		return [
			'title' => 'My awesome blog',
			'store' => $context->getExtensionAttributes()->getStore()->getName(),
			'current_customer_id' => $context->getUserId(),
			'user_type' => $context->getUserType(),
		];
	}
}
