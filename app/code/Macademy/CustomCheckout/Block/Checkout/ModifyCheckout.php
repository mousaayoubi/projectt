<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Block\Checkout;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\Information;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\App\ObjectManager;

class ModifyCheckout extends Template {

protected $storeInfo;

public function __construct(Information $storeInfo, Context $context, array $data = []){

$this->storeInfo = $storeInfo;

parent::__construct($context, $data);

}

public function getStorePhone(){

$storeManager = ObjectManager::getInstance()->get(\Magento\Store\Model\StoreManagerInterface::class);

$getStore = $storeManager->getStore();

return $this->storeInfo->getStoreInformationObject($getStore)->getPhone();

}

public function getCustomerEmail(){

$objectManager = ObjectManager::getInstance();
$customerSession = $objectManager->get(\Magento\Customer\Model\Session::class);

if ($customerSession->isLoggedIn()){

return $customerSession->getCustomer()->getEmail();

}
}
}
