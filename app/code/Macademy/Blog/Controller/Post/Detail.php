<?php declare(strict_types=1);

namespace Macademy\Blog\Controller\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\App\RequestInterface;

class Detail implements HttpGetActionInterface {

private $managerInterface;
private $requestInterface;
private $page;

public function __construct(PageFactory $page, ManagerInterface $managerInterface, RequestInterface $requestInterface){

$this->managerInterface = $managerInterface;
$this->requestInterface = $requestInterface;
$this->page = $page;

}

public function execute(){

$this->managerInterface->dispatch('macademy_post_detail_view', ['request' => $this->requestInterface]);

return $this->page->create();

}
}
