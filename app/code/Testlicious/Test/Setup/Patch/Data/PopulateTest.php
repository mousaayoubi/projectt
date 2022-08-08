<?php declare(strict_types=1);

namespace Testlicious\Test\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Testlicious\Test\Model\TestModelFactory;
use Testlicious\Test\Model\ResourceModel\TestResourceModel;

class PopulateTest implements DataPatchInterface
{

private $moduleDataSetup;
private $testModel;
private $testResourceModel;

public function __construct(ModuleDataSetupInterface $moduleDataSetup, TestModelFactory $testModel, TestResourceModel $testResourceModel){

$this->moduleDataSetup = $moduleDataSetup;
$this->testModel = $testModel;
$this->testResourceModel = $testResourceModel;

}

public static function getDependencies(){

return [];

}

public function getAliases(){

return [];

}

public function apply(){

$this->moduleDataSetup->getConnection()->startSetup();

$test = $this->testModel->create();

$data = [
'first_name' => 'test1',
'last_name' => 'test1',
'email' => 'test1@gmail.com',
];

$test->setData($data);

$this->testResourceModel->save($test);

$data = [
'first_name' => 'test2',
'last_name' => 'test2',
'email' => 'test2@gmail.com',
];

$test->setData($data);

$this->testResourceModel->save($test);

$data = [
'first_name' => 'test3',
'last_name' => 'test3',
'email' => 'test3@gmail.com',
];

$test->setData($data);

$this->testResourceModel->save($test);

$this->moduleDataSetup->getConnection()->endSetup();

}
}
