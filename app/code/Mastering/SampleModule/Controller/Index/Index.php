<?php

namespace Mastering\SampleModule\Controller\Index;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Http;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    private $resultPageFactory;
    private $eventManager;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
