<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;

class CustomConfigProvider implements ConfigProviderInterface
{

protected $layout;

public function __construct(LayoutInterface $layout){

$this->layout = $layout->createBlock('Magento\Cms\Block\Block')->setBlockId('fulfillment_status')->toHtml();

}

public function getConfig()
{

return [

'fulfillment_status' => $this->layout,

];

}
}

?>
