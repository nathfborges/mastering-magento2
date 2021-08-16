<?php
namespace Mastering\SampleModule\Test\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Mastering\SampleModule\Controller\Adminhtml\Index\Index;
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    private $pageFactoryMock;
    private $pageMock;
    private $index;
    private $contextMock;

    protected function setUp(): void
    {
        $this->pageFactoryMock = $this->createMock(PageFactory::class);
        $this->pageMock = $this->createMock(Page::class);
        $this->contextMock = $this->createMock(Context::class);
        $this->index = new Index($this->contextMock, $this->pageFactoryMock);
    }

    public function testExecute ()
    {
        $this->pageFactoryMock->method('create')->willReturn($this->pageMock);
        $this->assertEquals($this->pageMock, $this->index->execute());
    }
}
