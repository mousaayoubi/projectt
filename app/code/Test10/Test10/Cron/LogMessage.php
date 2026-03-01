<?php

declare(strict_types=1);

namespace Test10\Test10\Cron;

use Psr\Log\LoggerInterface;

class LogMessage
{
	protected $logger;

	public function __construct(
		LoggerInterface $logger
	){
	$this->logger = $logger;
	}

	public function execute()
	{
	$this->log->info(
		'Cron job executed successfully',
		[ 'time' => date('Y-m-d H:i:s')
		]
	);
	}
}
