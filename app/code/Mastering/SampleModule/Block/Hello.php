<?php

namespace Mastering\SampleModule\Block;

use Magento\Framework\App\Http;
use Magento\Framework\View\Element\Template;
use Mastering\SampleModule\Model\Item;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class Hello extends Template
{
    private CollectionFactory $collectionFactory;
    private $eventManager;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = [],
        Http $eventManager
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->eventManager = $eventManager;
        parent::__construct($context, $data);
    }

    /**
     * @return Item[]
     */
    public function getItemsFront(): array
    {
        return $this->collectionFactory->create()->getItems();
        $this->eventManager->dispatch('controller_front_send_response_before');
    }
}
