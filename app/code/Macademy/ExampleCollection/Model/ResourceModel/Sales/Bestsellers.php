<?php

namespace Macademy\ExampleCollection\Model\ResourceModel\Sales;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Bestsellers extends AbstractDb
{
const MAIN_TABLE = 'sales_bestsellers_aggregated_yearly';
const ID_FIELD_NAME = 'id';

protected function _construct()
{
$this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
}
}
