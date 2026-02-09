<?php

declare(strict_types=1);

namespace Test2\Test2\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Test2\Test2\Model\sayHiInterface;

class Index extends Action
{

	protected $context;
	protected $pageFactory;
	protected $jsonFactory;
	protected $sayHiInterface;

	public function __construct(
		Context $context,
		PageFactory $pageFactory,
		JsonFactory $jsonFactory,
		sayHiInterface $sayHiInterface
	){
		$this->jsonFactory = $jsonFactory;
		$this->sayHiInterface = $sayHiInterface;
		return parent::__construct($context);
	}

	public function execute()
	{
	$result = $this->jsonFactory->create();

	$data = $this->sayHiInterface->sayHi();

	$result->setData(['message' => $data]);

	return $result;

	}
}
