<?php declare(strict_types=1);

namespace Testlicious\Test\Plugin;

use Testlicious\Test\Controller\Test\Test;
use Psr\Log\LoggerInterface;

class TestPlugin
{

private $logger;

public function __construct(LoggerInterface $logger){

$this->logger = $logger;

}

public function afterExecute(Test $subject, $result){

$this->logger->notice('This is from the plugin.');

return $result;

}
}
