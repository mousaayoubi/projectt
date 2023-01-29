<?php declare(strict_types=1);

namespace Macademy\ExampleProxy\Model;

use Magento\Framework\Model\AbstractModel;

class Slow extends AbstractModel
{

public function _construct()
{

sleep(3);

}

public function getSomeData()
{

return 'some slow data';

}
}
