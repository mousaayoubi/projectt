<?php declare(strict_types=1);

namespace Testlicious\Test\Controller\Test;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\View\Result\PageFactory;

class Test implements HttpGetActionInterface
{

private $managerInterface;
private $page;

public function __construct(ManagerInterface $managerInterface, PageFactory $page){

$this->managerInterface = $managerInterface;
$this->page = $page;

}

public function execute(){

$this->managerInterface->dispatch('test', ['message' => 'The test page has been viewed.']);

return $this->page->create();

}
}
