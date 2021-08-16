<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Item;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Mastering\SampleModule\Model\ItemFactory;

class Save extends Action
{
    private $itemFactory;

    public function __construct(
        Context $context,
        ItemFactory $itemFactory
    ) {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $item = $this->itemFactory->create();
        $item->setData($this->getRequest()->getPostValue()['general'])
            ->save();
        return $this->resultRedirectFactory->create()->setPath('mastering/index/index');
    }
}
