<?php

declare(strict_types=1);

namespace Test1\Test1\Model;

use Magento\Shipping\Model\Carrier\AbstractCarrierInterface;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Psr\Log\LoggerInterface;
use Magento\Shipping\Model\Rate\ResultFactory;
use Magento\Quote\Model\Quote\Address\RateResult\MethodFactory;
use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory;
use Test1\Test1\Model\Rate\RateCalculatorInterface;

class CustomCarrier extends AbstractCarrier implements AbstractCarrierInterface
{
	protected $_code = 'test_test';
	private $rateCalculator;

	public function __construct(
		ScopeConfigInterface $scopeConfig,
		ErrorFactory $rateErrorFactory,
		LoggerInterface $logger,
		private ResultFactory $rateResultFactory,
		private MethodFactory $rateMethodFactory,
		RateCalculatorInterface $rateCalculator,
		array $data = []
	) {
		parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
		$this->rateCalculator = $rateCalculator;
	}
	public function isTrackingAvailable(): bool
	{
		return false;
	}

	public function getAllowedMethods(): array
	{

		return ['standard' => 'Standard'];
	}

	public function collectRates(RateRequest $request)
	{
		if (!$this->getConfigFlag('active')) {
		return false;
		}

		$result = $this->rateResultFactory->create();

		$method = $this->rateMethodFactory->create();
		$method->setCarrier($this->_code);
		$method->setCarrierTitle($this->getConfigData('title') ?: 'Test Carrier');
		$method->setMethod('standard');
		$method->setMethodTitle('Standard');

		$packageValue = (float) $request->getPackageValue();
		$price = $this->rateCalculator->calculate($packageValue);

		$method->setPrice($price);
		$method->setCost(10.00);

		$result->append($method);

		return $result;
	}
}
