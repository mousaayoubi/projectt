<?php declare(strict_types=1);

namespace Macademy\Minerva\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class Faq implements DataPatchInterface
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
$connection = $this->moduleDataSetup->getConnection();
$table = $connection->getTableName('macademy_minerva_faq');

$data = [
[
'question' => 'When will my order shipped?',
'answer' => 'All orders are shipped as soon as they are ready.',
'is_published' => true
],
[
'question' => 'Which products do you recommend that I buy?',
'answer' => 'All of our products are of very high quality.',
'is_published' => false
],
[
'question' => 'What is your customer support number?',
'answer' => 'Our customer support number is +1 (415)352-3637.',
'is_published' => true
]
];

$insertData = $connection->insertMultiple($table, $data);

return $insertData;
}
}
