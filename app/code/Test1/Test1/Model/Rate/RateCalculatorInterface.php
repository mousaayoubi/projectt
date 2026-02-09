<?php

declare(strict_types=1);

namespace Test1\Test1\Model\Rate;

interface RateCalculatorInterface
{

	public function calculate(float $packageValue): float;
}
