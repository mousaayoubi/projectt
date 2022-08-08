<?php declare(strict_types=1);

namespace Macademy\Minerva\Controller\Adminhtml\Faqs;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface
{

const ADMIN_RESOURCE = 'Macademy_Minerva::minerva';

protected $resultPageFactory;

public function __construct(Context $context, PageFactory $resultPageFactory)
{
parent::__construct($context);

$this->resultPageFactory = $resultPageFactory;

}

public function execute()
{

$resultPage = $this->resultPageFactory->create();
$resultPage->setActiveMenu(static::ADMIN_RESOURCE);
$resultPage->getConfig()->getTitle()->prepend(__('FAQs'));

return $resultPage;

}
}
