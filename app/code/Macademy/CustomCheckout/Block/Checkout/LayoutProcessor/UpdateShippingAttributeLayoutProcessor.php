<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Block\Checkout\LayoutProcessor;

use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;

class UpdateShippingAttributeLayoutProcessor implements LayoutProcessorInterface
{

public function process($jsLayout)
{

$attributeCode = 'address_classification';

$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['address_classification']['config']['customScope'] = 'shippingAddress.custom_attributes';

$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['address_classification']['dataScope'] = "shippingAddress.custom_attributes.$attributeCode";

return $jsLayout;

}
}
