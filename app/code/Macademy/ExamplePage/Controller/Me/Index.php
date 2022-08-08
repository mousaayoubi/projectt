<?php

namespace Macademy\ExamplePage\Controller\Me;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
protected $customerSession;

public function __construct(Context $context, Session $customerSession)
{
$this->customerSession = $customerSession;
parent::__construct($context);
}

public function execute()
{
$result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
$customerId = $this->customerSession->getCustomerId();

$result->setContents("customer_id: $customerId");

return $result;
}
}
