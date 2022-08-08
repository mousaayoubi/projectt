<?php

namespace Macademy\ExamplePage\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
public function execute()
{
$result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
$customerId = 0;

$result->setContents("customer_id: $customerId");

return $result;
}
}
