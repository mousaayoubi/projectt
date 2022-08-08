<?php declare(strict_types=1);

namespace Macademy\Blog\Model;

use Macademy\Blog\Api\PostRepositoryInterface;
use Macademy\Blog\Model\PostFactory;
use Macademy\Blog\Model\ResourceModel\Post as PostResourceModel;

class PostRepository implements PostRepositoryInterface
{

private $postFactory;
private $postResourceModel;

public function __construct(PostFactory $postFactory, PostResourceModel $postResourceModel){

$this->postFactory = $postFactory;
$this->postResourceModel = $postResourceModel;

}

public function getById($id){

$post = $this->postFactory->create();

$this->postResourceModel->load($post, $id);

return $post;

}

public function save($post){

$this->postResourceModel->save($post);

return $post;

}

public function deleteById($id){

$post = $this->getById($id);

$this->postResourceModel->delete($post);

return true;

}
}
