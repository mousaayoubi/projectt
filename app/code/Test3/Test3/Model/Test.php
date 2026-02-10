<?php

declare(strict_types=1);

namespace Test3\Test3\Model;

use Magento\Framework\Model\AbstractModel;

class Test extends AbstractModel
{
	protected function _construct()
	{
		$this->_init(\Test3\Test3\Model\ResourceModel\Test::class);
	}
}
