<?php declare(strict_types=1);

namespace Macademy\Blog\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Macademy\Blog\Model\Post as PostModel;
use Macademy\Blog\Model\ResourceModel\Post as PostResourceModel;


class Collection extends AbstractCollection 
{

protected function _construct(){

$this->_init(PostModel::class, PostResourceModel::class);

}
}
