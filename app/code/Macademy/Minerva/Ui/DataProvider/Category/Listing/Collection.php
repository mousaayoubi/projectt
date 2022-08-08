<?php declare(strict_types=1);

namespace Macademy\Minerva\Ui\DataProvider\Category\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
protected function _initSelect()
{
$this->addFilterToMap('id', 'macademy_minerva_faq.id');
parent::_initSelect();
}
}
