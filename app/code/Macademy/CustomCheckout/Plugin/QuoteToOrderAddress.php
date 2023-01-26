<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Plugin;

use Magento\Quote\Model\Quote\Address\ToOrderAddress;
use Magento\Sales\Api\Data\OrderAddressInterface;
use Magento\Quote\Model\Quote\Address;

class QuoteToOrderAddress
{

public function afterConvert(
ToOrderAddress $subject,
OrderAddressInterface $result,
Address $address
){

if ($addressClassification = $address->getData('address_classification')){
$result->setData('address_classification', $addressClassification);
}

return $result;

}
}
