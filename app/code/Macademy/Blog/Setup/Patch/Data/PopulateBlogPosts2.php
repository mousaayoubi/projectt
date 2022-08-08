<?php declare(strict_types=1);

namespace Macademy\Blog\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Macademy\Blog\Model\PostFactory;
use Macademy\Blog\Api\PostRepositoryInterface;

class PopulateBlogPosts2 implements DataPatchInterface
{

private $moduleDataSetup;
private $postFactory;
private $postRepository;

public function __construct(ModuleDataSetupInterface $moduleDataSetup, PostFactory $postFactory, PostRepositoryInterface $postRepository){

$this->moduleDataSetup = $moduleDataSetup;
$this->postFactory = $postFactory;
$this->postRepository = $postRepository;

}

public static function getDependencies(){

return [];

}

public function getAliases(){

return [];

}

public function apply(){

$this->moduleDataSetup->startSetup();

$post = $this->postFactory->create();
$post->setData([
'title' => 'Today is sunny',
'content' => 'The weather has beeen great all week.',
]);

$this->postRepository->save($post);


$this->moduleDataSetup->endSetup();

}
}
