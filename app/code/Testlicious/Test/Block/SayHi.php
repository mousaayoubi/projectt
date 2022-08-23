<?php declare(strict_types=1);

namespace Testlicious\Test\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class SayHi extends Template 
{

public function __construct(Context $context)
{

parent::__construct($context);

}

public function sayHi()
{

return 'hi world';

}
}
