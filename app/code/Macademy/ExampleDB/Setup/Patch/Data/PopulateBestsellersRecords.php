<?php

namespace Macademy\ExampleDB\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Macademy\ExampleDB\Model\ResourceModel\Sales\Bestsellers as BestsellersResourceModel;

class PopulateBestsellersRecords implements DataPatchInterface
{
private $moduleDataSetup;

public function __construct(ModuleDataSetupInterface $moduleDataSetup)
{
$this->moduleDataSetup = $moduleDataSetup;
}

public static function getDependencies()
{
return [];
}

public function getAliases()
{
return [];
}

public function apply()
{
$setup = $this->moduleDataSetup;

$setup->startSetup();

$table = $setup->getTable(BestsellersResourceModel::MAIN_TABLE);

$setup->getConnection()->insert($table, [
'id' => 1,
'is_prefered' => true,
]);

$setup->getConnection()->insert($table, [
'id' => 3,
'is_prefered' => true,
]);

$setup->endSetup();

}
}
