<?php declare(strict_types=1);

namespace Macademy\Minerva\Controller\Adminhtml\Faqs;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Macademy\Minerva\Model\FaqFactory;
use Macademy\Minerva\Model\ResourceModel\Faq as ResourceModelFaq;

class InlineEdit extends Action
{

const ADMIN_RESOURCE = 'Macademy_Minerva::minerva';

protected $jsonFactory;
private $faqFactory;
private $resourceModelFaq;

public function __construct(Context $context, JsonFactory $jsonFactory, FaqFactory $faqFactory, ResourceModelFaq $resourceModelFaq)
{
parent::__construct($context);
$this->jsonFactory = $jsonFactory;
$this->faqFactory = $faqFactory;
$this->resourceModelFaq = $resourceModelFaq;
}

public function execute()
{
$resultJson = $this->jsonFactory->create();
$error = false;
$messages = [];

if ($this->getRequest()->getParam('isAjax'))
{
$postItems = $this->getRequest()->getParam('items', []);

if (!count($postItems))
{
$messages[] = __('Please correct the data sent.');
$error = true;
}
else
{
foreach (array_keys($postItems) as $modelid)
{
$model = $this->faqFactory->create();
$this->resourceModelFaq->load($model, $modelid);

try
{
$model->setData(array_merge($model->getData(), $postItems[$modelid]));
$this->resourceModelFaq->save($model);
}

catch (\Exception $e)
{
$messages[] = "[Error : {$modelid}] {$e->getMessage()}";
$error = true;
}
}
}
}

return $resultJson->setData([
'messages' => $messages,
'error' => $error
]);
}
}
