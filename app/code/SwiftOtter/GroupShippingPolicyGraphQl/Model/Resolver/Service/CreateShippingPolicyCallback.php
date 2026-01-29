<?php

declare(strict_types=1);

namespace SwiftOtter\GroupShippingPolicyGraphQl\Model\Resolver\Service;

use SwiftOtter\GroupShippingPolicy\Api\Data\GroupShippingPolicyInterface;
use Magento\Customer\Model\Group;
use SwiftOtter\GroupShippingPolicy\Api\GroupShippingPolicyRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use SwiftOtter\GroupShippingPolicy\Api\PolicyCallbackRepositoryInterface;
use SwiftOtter\GroupShippingPolicy\Api\Data\PolicyCallbackInterface;
use SwiftOtter\GroupShippingPolicy\Api\Data\PolicyCallbackInterfaceFactory;

class CreateShippingPolicyCallback
{

	private $policyRepository;
	private $searchCriteriaBuilder;
	private $policyCallbackRepository;
	private $policyCallbackFactory;

	public function __construct(
		GroupShippingPolicyRepositoryInterface $policyRepository,
		SearchCriteriaBuilder $searchCriteriaBuilder,
		PolicyCallbackRepositoryInterface $policyCallbackRepository,
		PolicyCallbackInterfaceFactory $policyCallbackFactory
	)
	{

		$this->policyRepository = $policyRepository;
		$this->searchCriteriaBuilder = $searchCriteriaBuilder;
		$this->policyCallbackRepository = $policyCallbackRepository;
		$this->policyCallbackFactory = $policyCallbackFactory;
	}
	public function execute(?int $customerGroupId, string $phone): array
	{

		$policy = $this->getShippingPolicy($customerGroupId);
		$callback = $this->policyCallbackFactory->create();
		$callback->setPolicyId((int) $policy->getId())
	   ->setPhone($phone);

		$savedCallback = $this->policyCallbackRepository->save($callback);
		return $this->formatCallbackData(
			$savedCallback,
			$policy
		);
	}

	private function getShippingPolicy(?int $customerGroupId): GroupShippingPolicyInterface
	{

		if ($customerGroupId === null) {

			$customerGroupId = Group::NOT_LOGGED_IN_ID;
		}

		$this->searchCriteriaBuilder->addFilter('customer_group_id', $customerGroupId);
		$policies = $this->policyRepository->getList($this->searchCriteriaBuilder->create())->getItems();

		if (empty($policies)) {

			throw new GraphQlNoSuchEntityException(__('No shipping policy associated with this user'));
		}

		return current($policies);
	}

	private function formatCallbackData(
		PolicyCallbackInterface $policyCallback,
		GroupShippingPolicyInterface $policy
	): array 
	{

		$createdAt = $policyCallback->getCreatedAt();

		return [

			'policy_title' => $policy->getTitle(),
			'phone' => $policyCallback->getPhone(),
			'created_at' => ($createdAt !== null) ? $createdAt->format('Y-m-d H:i:s') : null,
		];
	}
}
