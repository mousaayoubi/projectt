<?php

declare(strict_types=1);

namespace Test5\Test5\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Note extends AbstractDb
{
	protected function _construct()
	{
		$this->_init('vendor_note', 'entity_id');
	}

	public function getAllNotes()
	{
		$conn = $this->getConnection();

		$sql = "SELECT * FROM vendor_note;";

		return $conn->fetchAll($sql);
	}
}

