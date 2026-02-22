<?php

declare(strict_types=1);

namespace Test5\Test5\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Test5\Test5\Model\ResourceModel\Note\CollectionFactory;

class Test extends Action
{
	protected $collectionFactory;

	public function __construct(
		Context $context,
		CollectionFactory $collectionFactory
	){
		parent::__construct($context);
		$this->collectionFactory = $collectionFactory;
	}

	public function execute()
	{
		$collection = $this->collectionFactory->create();
		$collection->addFieldToFilter('content', ['like' => '%test%']);

		foreach ($collection as $note){
			echo $note->getData('entity_id').'_'.$note->getData('content');
			echo '<br />';
		}
	}
}
