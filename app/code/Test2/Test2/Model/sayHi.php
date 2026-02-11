<?php

declare(strict_types=1);

namespace Test2\Test2\Model;

use Test3\Test3\Model\TestFactory;

class sayHi implements sayHiInterface
{
	protected $testFactory;

	public function __construct(
	TestFactory $testFactory
	){
	$this->testFactory = $testFactory;
	}
	public function sayHi()
{
        $test = $this->testFactory->create();
        $test->setData(['test' => 'test']);
        $test->save();

        return ['hi' => 'hi'];
}
}
