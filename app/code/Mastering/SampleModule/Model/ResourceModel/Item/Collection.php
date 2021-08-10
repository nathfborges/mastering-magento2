<?php

namespace Mastering\SampleModule\Model\ResourceModel\Item;

use Mastering\SampleModule\Model\ResourceModel\Item as ItemResource;
use Mastering\SampleModule\Model\Item;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            Item::class,
            ItemResource::class
        );
    }
}
