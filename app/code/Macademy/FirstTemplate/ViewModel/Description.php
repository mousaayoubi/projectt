<?php

namespace Macademy\FirstTemplate\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Description implements ArgumentInterface
{
public function sayHi()
{
return 'hi world from view model';
}
}
