<?php declare(strict_types=1);

namespace Macademy\Minerva\Model;

use Magento\Framework\Model\AbstractModel;
use Macademy\Minerva\Model\ResourceModel\Faq as ResourceModelFaq;

class Faq extends AbstractModel
{

protected function _construct()
{
$this->_init(ResourceModelFaq::class);
}
}
