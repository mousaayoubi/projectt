<?php

declare(strict_types=1);

namespace Test1\Test1\Model\Rate;

class FlatRateCalculator implements RateCalculatorInterface
{

	public function calculate(float $packageValue): float
	{

		return $packageValue = 30;
	}
}
