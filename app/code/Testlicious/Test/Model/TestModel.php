<?php declare(strict_types=1);

namespace Testlicious\Test\Model;

use Magento\Framework\Model\AbstractModel;
use Testlicious\Test\Model\ResourceModel\TestResourceModel;

class TestModel extends AbstractModel
{

protected function _construct(){

$this->_init(TestResourceModel::class);

}
}
