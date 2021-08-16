<?php

namespace Mastering\SampleModule\Cron;

use Magento\Setup\Exception;
use Mastering\SampleModule\Model\ItemFactory;
use Mastering\SampleModule\Model\Config;

class AddItem
{
    private ItemFactory $itemFactory;
    private Config $config;

    public function __construct(ItemFactory $itemFactory, Config $config)
    {
        $this->itemFactory = $itemFactory;
        $this->config = $config;
    }

    public function execute()
    {
        if ($this->config->isEnabled()) {
            $this->itemFactory->create()
                ->setItem('Sabonete')
                ->setPeso('200')
                ->setCodigo_produto('38620')
                ->setEstoque(78)
                ->save();
        }
    }
}
