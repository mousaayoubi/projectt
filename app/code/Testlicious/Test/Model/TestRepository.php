<?php declare(strict_types=1);

namespace Testlicious\Test\Model;

use Testlicious\Test\Api\TestRepositoryInterface;

class TestRepository implements TestRepositoryInterface
{

/**
* @api
* @return string
*/
public function getMessage(){

return 'This is from the rest api.';

}
}
