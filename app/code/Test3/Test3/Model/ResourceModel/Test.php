<?php

declare(strict_types=1);

namespace Test3\Test3\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Test extends AbstractDb
{
	protected function _construct()
	{
		$this->_init('test','id');
	}
}
