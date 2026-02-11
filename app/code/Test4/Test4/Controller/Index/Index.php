<?php

declare(strict_types=1);

namespace Test4\Test4\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\PageFactory;
use Test3\Test3\Model\TestFactory;

class Index implements HttpGetActionInterface
{
	protected $pageFactory;
	protected $jsonFactory;
	protected $testFactory;

	public function __construct(
		PageFactory $pageFactory,
		JsonFactory $jsonFactory,
		TestFactory $testFactory,
	){
		$this->jsonFactory = $jsonFactory;
		$this->pageFactory = $pageFactory;
		$this->testFactory = $testFactory;
	}

	public function execute()
	{
		$result = $this->jsonFactory->create();

		$test = $this->testFactory->create()->load(1);
		
		$data = $test->getData('test');

		echo $data;

		return $result;
	}
}
