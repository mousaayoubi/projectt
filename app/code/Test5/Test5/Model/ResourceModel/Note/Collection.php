<?php

declare(strict_types=1);

namespace Test5\Test5\Model\ResourceModel\Note;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Test5\Test5\Model\Note as NoteModel;
use Test5\Test5\Model\ResourceModel\Note as NoteResourceModel;

class Collection extends AbstractCollection
{

	protected function _construct()
	{
		$this->_init(NoteModel::class, NoteResourceModel::class);
	}
}
