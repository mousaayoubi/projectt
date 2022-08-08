<?php declare(strict_types=1);

namespace Macademy\Minerva\Ui\Component\Listing\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Catalog\Block\Adminhtml\Category\AbstractCategory;

class Add extends AbstractCategory implements ButtonProviderInterface
{

public function getButtonData()
{
return [
'id' => 'add_new_faq',
'label' => __('Add New Faq'),
'class' => 'primary',
'url' => 'minerva/faqs/add/'
];

}
}
