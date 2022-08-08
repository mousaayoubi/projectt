<?php declare(strict_types=1);

namespace Macademy\Blog\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Forward;

class Index implements HttpGetActionInterface {

private $forward;

public function __construct(Forward $forward){

$this->forward = $forward;

}

public function execute(){

return $this->forward->setController('post')->forward('list');

}
}
