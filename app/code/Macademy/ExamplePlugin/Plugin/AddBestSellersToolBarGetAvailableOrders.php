<?php

namespace Macademy\ExamplePlugin\Plugin;

use Magento\Catalog\Block\Product\ProductList\Toolbar;

class AddBestSellersToolBarGetAvailableOrders
{
public function afterGetAvailableOrders(Toolbar $subject, $result)
{
$result['bestsellers'] = 'Best Sellers';

return $result;
}
}
