<?php

namespace Macademy\ExampleDB\Model\Sales;

use Magento\Framework\Model\AbstractModel;
use Macademy\ExampleDB\Model\ResourceModel\Sales\Bestsellers as BestsellersResourceModel;

class Bestsellers extends AbstractModel
{
protected function _construct()
{
$this->_init(BestsellersResourceModel::class);
}
}
