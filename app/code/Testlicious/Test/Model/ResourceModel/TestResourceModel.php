<?php declare(strict_types=1);

namespace Testlicious\Test\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class TestResourceModel extends AbstractDb
{

const MAIN_TABLE = 'testlicious_test_test';
const ID_FIELD_NAME = 'id';

protected function _construct(){

$this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);

}
}
