<?php

namespace Macademy\ThirdPage\Controller\Recommended;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
public function execute()
{
$result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
$result->setContents('Recommended Products');

return $result;
}
}
