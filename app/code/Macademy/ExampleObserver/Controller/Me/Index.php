<?php

namespace Macademy\ExampleObserver\Controller\Me;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
protected $customerSessionMe;

public function __construct(Context $context, Session $customerSessionMe)
{
$this->customerSessionMe = $customerSessionMe;
parent::__construct($context);
}

public function execute()
{
$result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
$customerNo = $this->customerSessionMe->getCustomerId();

$this->_eventManager->dispatch('customer_no_event', [
'customer_no' => $customerNo,
]);

$result->setContents("customer_no: $customerNo");

return $result;
}
}
