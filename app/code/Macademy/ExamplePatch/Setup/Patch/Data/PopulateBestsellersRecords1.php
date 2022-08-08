<?php

namespace Macademy\ExamplePatch\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Macademy\ExamplePatch\Model\Sales\BestsellersFactory as BestsellersModelFactory;
use Macademy\ExamplePatch\Model\ResourceModel\Sales\Bestsellers as BestsellersResourceModel;

class PopulateBestsellersRecords1 implements DataPatchInterface
{
protected $moduleDataSetup;
protected $bestsellersModelFactory;
protected $bestsellersResourceModel;

public function __construct(ModuleDataSetupInterface $moduleDataSetup, BestsellersModelFactory $bestsellersModelFactory, BestsellersResourceModel $bestsellersResourceModel)
{
$this->moduleDataSetup = $moduleDataSetup;
$this->bestsellersModelFactory = $bestsellersModelFactory;
$this->bestsellersResourceModel = $bestsellersResourceModel;
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

$bestsellers = $this->bestsellersModelFactory->create();

$data = [
'id' => 5,
'is_prefered' => true,
];

$bestsellers->setData($data);

$this->bestsellersResourceModel->save($bestsellers);

$setup->endSetup();

}
}
