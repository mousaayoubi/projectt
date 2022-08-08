<?php

namespace Macademy\ExampleCollection\Controller\Categories;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Macademy\ExampleCollection\Model\ResourceModel\Sales\Bestsellers\CollectionFactory as BestsellersCollectionFactory;

class Index extends Action
{
protected $bestsellersCollectionFactory;

public function __construct(Context $context, BestsellersCollectionFactory $bestsellersCollectionFactory)
{
$this->bestsellersCollectionFactory = $bestsellersCollectionFactory;
parent::__construct($context);
}

public function execute()
{
$result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
$bestsellersCollection = $this->bestsellersCollectionFactory->create();

$filteredBestsellersCollection = $bestsellersCollection->addFieldToFilter('qty_ordered', [
"gt" => 1,
]);

$firstItem = $bestsellersCollection->getFirstItem();
$allItems = $filteredBestsellersCollection->getItems();

echo '<pre>';
var_dump($filteredBestsellersCollection->load()->getSelect()->__toString());

echo '<pre>';
foreach ($allItems as $item) {
var_dump($item->getData());
};

$customerId = 1;

$result->setContents("customer_id: $customerId");

return $result;
}
}
