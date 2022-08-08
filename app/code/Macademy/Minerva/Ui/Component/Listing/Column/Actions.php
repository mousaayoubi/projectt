<?php declare(strict_types=1);

namespace Macademy\Minerva\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\UrlInterface;

class Actions extends Column
{
protected $urlBuilder;

public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, UrlInterface $urlBuilder, $components = [], $data = [])
{
$this->urlBuilder = $urlBuilder;
parent::__construct($context, $uiComponentFactory, $components, $data);
}

public function prepareDataSource(array $dataSource)
{
if (isset($dataSource['data']['items'])) {
foreach ($dataSource['data']['items'] as & $item) {

$item[$this->getData('name')] = [
'update' => [
'href' => $this->urlBuilder->getUrl('minerva/faqs/update', [
'id' => $item['id'],
]),
'label' => __('Update'),
],
'delete' => [
'href' => $this->urlBuilder->getUrl('minerva/faqs/delete', [
'id' => $item['id'],
]),
'label' => __('Delete'),
],
];
}
}

return $dataSource;
}
}
