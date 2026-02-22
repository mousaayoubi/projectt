<?php 

declare(strict_types=1);

namespace Test6\Test6\Plugin;

class ProductNamePlugin
{
	public function afterGetName(
		\Magento\Catalog\Model\Product $subject,
		$result
	){
		return $result . " ✅";
	}
}
