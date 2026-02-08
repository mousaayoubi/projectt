<?php

declare(strict_types=1);

namespace Test\Test\Model\Rate;

interface RateCalculatorInterface
{

	public function calculate(float $packageValue): float;
}
