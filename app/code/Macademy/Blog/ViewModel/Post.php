<?php declare(strict_types=1);

namespace Macademy\Blog\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Macademy\Blog\Model\ResourceModel\Post\Collection as PostCollection;
use Macademy\Blog\Api\PostRepositoryInterface;
use Magento\Framework\App\RequestInterface;

class Post implements ArgumentInterface
{

private $collection;
private $postRepository;
private $request;

public function __construct(PostCollection $collection, PostRepositoryInterface $postRepository, RequestInterface $request){

$this->collection = $collection;
$this->postRepository = $postRepository;
$this->request = $request;

}

public function getList(){

return $this->collection->getItems();

}

public function count(){

return $this->collection->count();

}

public function getDetail(){

$id = $this->request->getParam('id');

return $this->postRepository->getById($id);

}
}
