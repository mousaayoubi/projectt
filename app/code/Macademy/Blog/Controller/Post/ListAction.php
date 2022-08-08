<?php declare(strict_types=1);

namespace Macademy\Blog\Controller\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class ListAction implements HttpGetActionInterface {

private $page;

public function __construct(PageFactory $page){

$this->page = $page;

}

public function execute(){

return $this->page->create();

}
}
