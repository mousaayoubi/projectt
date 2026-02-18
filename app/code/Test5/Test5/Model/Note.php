<?php

declare(strict_types=1);

namespace Test5\Test5\Model;

use Magento\Framework\Model\AbstractModel;
use Test5\Test5\Model\ResourceModel\Note as NoteResource;

class Note extends AbstractModel
{
	protected function _construct()
	{
		$this->_init(NoteResource::class);
	}
}
