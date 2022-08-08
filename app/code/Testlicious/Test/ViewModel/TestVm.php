<?php declare(strict_types=1);

namespace Testlicious\Test\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Testlicious\Test\Model\ResourceModel\TestModel\Collection;

class TestVm implements ArgumentInterface
{

private $collection;

public function __construct(Collection $collection){

$this->collection = $collection;

}

public function getList(){

return $this->collection->getItems();

}
}
