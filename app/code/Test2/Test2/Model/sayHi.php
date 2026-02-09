<?php

declare(strict_types=1);

namespace Test2\Test2\Model;

class sayHi implements sayHiInterface
{

	public function sayHi()
{
	return ['hi' => 'hi'];
}
}
