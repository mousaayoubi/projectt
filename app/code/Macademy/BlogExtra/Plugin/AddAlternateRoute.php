<?php declare(strict_types=1);

namespace Macademy\BlogExtra\Plugin;

use Macademy\Blog\Controller\Post\Detail;
use Magento\Framework\App\RequestInterface;

class AddAlternateRoute 
{
private $request;

public function __construct(RequestInterface $request){

$this->request = $request;

}

public function afterExecute(Detail $subject, $result){

if ($this->request->getParam('alternate')){

$result->getLayout()->getBlock('blog.post.main')->setTemplate('Macademy_BlogExtra::main.phtml');

}

return $result;

}
}
