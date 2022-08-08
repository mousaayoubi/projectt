<?php

namespace Macademy\FirstPage\Controller\Categories;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\HTTP\PhpEnvironment\Request;

class Index extends Action
{
public function execute()
{
$result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
$request = $this->getRequest();

$categoryId = $request->getParam('category_id');
$limit = $request->getParam('limit');

$result->setContents("category_id: $categoryId, limit: $limit");

return $result;
}
}
