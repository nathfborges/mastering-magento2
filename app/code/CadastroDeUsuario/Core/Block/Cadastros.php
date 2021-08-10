<?php

namespace CadastroDeUsuario\Core\Block;

use CadastroDeUsuario\Core\Model\Config;
use Magento\Framework\View\Element\Template;
use CadastroDeUsuario\Core\Model\Cadastro;
use CadastroDeUsuario\Core\Model\ResourceModel\Cadastro\CollectionFactory;
use Psr\Log\LoggerInterface;

class Cadastros extends Template
{
    private CollectionFactory $collectionFactory;

    /** @var Config */
    private $config;

    /** @var LoggerInterface */
    private $logger;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        LoggerInterface $logger,
        Config $config,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->logger = $logger;
        $this->config = $config;
        parent::__construct($context, $data);
    }

    /**
     * @return Cadastro[]
     */
    public function getCadastros(): array
    {
        return $this->collectionFactory->create()->getItems();
    }

    /**
     * @return Cadastro[]
     */
    public function getCadastrosFront(): array
    {
        if ($this->config->isEnabled()) {
            $date = new \DateTime();
            $date = $date->format("d/m/Y");
            $this->logger->info('Data de acesso: ' . $date);
        }
        return $this->collectionFactory->create()->getItems();
    }
}
