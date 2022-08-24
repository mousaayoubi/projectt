<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Block\Checkout;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\App\ObjectManager;

class ModifyCheckout extends Template {

protected $storeManager;

public function __construct(StoreManagerInterface $storeManager, Context $context, array $data = []){

$this->storeManager = $storeManager;

parent::__construct($context, $data);

}

public function getStorePhone(){

$objectManager = ObjectManager::getInstance();

$storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');

return $storeManager->getStore()->getStoreId();

}
}
