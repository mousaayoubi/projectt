<?php declare(strict_types=1);

namespace Macademy\Minerva\Model\ResourceModel\Faq;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Macademy\Minerva\Model\Faq as ModelFaq;
use Macademy\Minerva\Model\ResourceModel\Faq as ResourceModelFaq;

class Collection extends AbstractCollection
{
protected $_idFieldName = 'id';

protected function _construct()
{
$this->_init(ModelFaq::class, ResourceModelFaq::class);
}
}
