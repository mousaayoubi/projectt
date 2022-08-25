<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Block\Checkout;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\Information;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\App\ObjectManager;

class ModifyCheckout extends Template {

protected $storeManager;
protected $storeInfo;

public function __construct(StoreManagerInterface $storeManager, Information $storeInfo, Context $context, array $data = []){

$this->storeManager = $storeManager;
$this->storeInfo = $storeInfo;

parent::__construct($context, $data);

}

public function getStorePhone(){

return $this->storeInfo->getStoreInformationObject($this->storeManager->getStore())->getCity();

}
}
