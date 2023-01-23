<?php declare(strict_types=1);

namespace Macademy\ExampleEav\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Customer\Model\ResourceModel\Attribute;
use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Api\AddressMetadataInterface;

class AddressTestAttribute implements DataPatchInterface
{

const ATTRIBUTE_CODE = 'address_test';

private $attribute;
private $config;
private $eavSetupFactory;
private $moduleDataSetup;

public function __construct(
Attribute $attribute,
Config $config,
EavSetupFactory $eavSetupFactory,
ModuleDataSetupInterface $moduleDataSetup
)
{

$this->attribute = $attribute;
$this->config = $config;
$this->eavSetupFactory = $eavSetupFactory;
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

$eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

$eavSetup->addAttribute(
AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
self::ATTRIBUTE_CODE,
[
'type' => 'text',
'label' => 'Address Test',
'input' => 'text',
'source' => '',
'required' => true,
'default' => '',
'system' => false,
'position' => 160,
'sort_order' => 160,
]
);

$attribute = $this->config->getAttribute(
AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
self::ATTRIBUTE_CODE
);

$attribute->setData('used_in_forms', [
'adminhtml_customer',
'adminhtml_customer_address',
'adminhtml_checkout',
'customer_address_edit',
'customer_register_address',
'customer_account_create',
'customer_account_edit',
]);

$this->attribute->save($attribute);

return $this;

}
}
