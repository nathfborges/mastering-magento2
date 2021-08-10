<?php

namespace Mastering\SampleModule\Block;

use Magento\Framework\View\Element\Template;
use Mastering\SampleModule\Model\Item;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class Hello extends Template
{
    private CollectionFactory $collectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->collectionFactory->create()->getItems();
    }
}
