<?php

namespace Mastering\SampleModule\Model;

use Mastering\SampleModule\Model\ResourceModel\Item as ItemResource;

class Item extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(ItemResource::class);
    }
}
