<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Block\Checkout\LayoutProcessor;

use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;

class UpdateShippingAttributeLayoutProcessor implements LayoutProcessorInterface
{

public function process($jsLayout)
{

$attributeCode = 'address_classification';
$attributeCodeTest = 'address_test';

$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['address_classification']['config']['customScope'] = 'shippingAddress.custom_attributes';

$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['address_classification']['dataScope'] = "shippingAddress.custom_attributes.$attributeCode";

foreach ($jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']['payment']['children']['payments-list']['children'] as &$paymentMethod){

$fields = &$paymentMethod['children']['form-fields']['children'];

if (isset($fields[$attributeCode])){
unset($fields[$attributeCode]);
}

if (isset($fields[$attributeCodeTest])){
unset($fields[$attributeCodeTest]);
}
}

return $jsLayout;

}
}
