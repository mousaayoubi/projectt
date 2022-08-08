<?php

namespace Macademy\ExampleCollection\Model\ResourceModel\Sales\Bestsellers;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Macademy\ExampleCollection\Model\Sales\Bestsellers as BestsellersModel;
use Macademy\ExampleCollection\Model\ResourceModel\Sales\Bestsellers as BestsellersResourceModel;

class Collection extends AbstractCollection
{
protected function _construct()
{
$this->_init(BestsellersModel::class, BestsellersResourceModel::class);
}
}
