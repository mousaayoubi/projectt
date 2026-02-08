<?php

declare(strict_types=1);

namespace Test\Test\Model\Rate;

class FlatRateCalculator implements RateCalculatorInterface
{

	public function calculate(float $packageValue): float
	{

		return $packageValue = 10;
	}
}
