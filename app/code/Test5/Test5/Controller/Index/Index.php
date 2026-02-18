<?php

declare(strict_types=1);

namespace Test5\Test5\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Test5\Test5\Model\ResourceModel\Note;
use Test5\Test5\Model\ResourceModel\Note\CollectionFactory;

class Index extends Action
{
	protected $noteResource;
	protected $collectionFactory;

	public function __construct(
		Context $context,
		Note $noteResource,
		CollectionFactory $collectionFactory
	){
		parent::__construct($context);
		$this->noteResource = $noteResource;
		$this->collectionFactory = $collectionFactory;
	}

	public function execute()
	{
		$notes = $this->noteResource->getAllNotes();
		print_r($notes);
		echo '<br />';

		$collection = $this->collectionFactory->create();
		$collection->addFieldToFilter('title', ['like' => '%test%']);

		foreach ($collection as $note) {
			echo $note->getData('entity_id').'_'.$note->getData('title');
			echo '<br />';
		}
	}
}
