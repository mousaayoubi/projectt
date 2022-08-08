<?php declare(strict_types=1);

namespace Testlicious\Test\Model\ResourceModel\TestModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Testlicious\Test\Model\TestModel;
use Testlicious\Test\Model\ResourceModel\TestResourceModel;

class Collection extends AbstractCollection
{

protected function _construct(){

$this->_init(TestModel::class, TestResourceModel::class);

}
}
