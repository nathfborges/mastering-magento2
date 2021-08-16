<?php

namespace Mastering\SampleModule\Test\Controller\Adminhtml\Item;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Mastering\SampleModule\Controller\Adminhtml\Item\Save;
use Mastering\SampleModule\Model\Item;
use Mastering\SampleModule\Model\ItemFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\Result\Redirect;
use PHPUnit\Framework\TestCase;

class SaveTest extends TestCase
{
    private $save;
    private $contextMock;
    private $itemFactoryMock;
    private $itemMock;
    private $requestInterfaceMock;
    private $resultRedirectFactoryMock;
    private $resultRedirectMock;

    protected function setUp(): void
    {
        $this->contextMock = $this->createMock(Context::class);
        $this->itemFactoryMock = $this->createMock(ItemFactory::class);
        $this->itemMock = $this->getMockBuilder(Item::class)
            ->disableOriginalConstructor()
            ->setMethods(['save', 'setData'])
            ->getMock();
        $this->resultRedirectFactoryMock = $this->createMock(RedirectFactory::class);
        $this->requestInterfaceMock = $this->getMockBuilder(RequestInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['getPostValue'])
            ->getMockForAbstractClass();
        $this->resultRedirectMock = $this->createMock(Redirect::class);

        $this->contextMock->method('getRequest')->willReturn($this->requestInterfaceMock);
        $this->contextMock->method('getResultRedirectFactory')->willReturn($this->resultRedirectFactoryMock);
        $this->save = new Save($this->contextMock,$this->itemFactoryMock);
    }

    public function testExecute()
    {
        $this->itemFactoryMock
            ->method('create')
            ->willReturn($this->itemMock);

        $this->requestInterfaceMock->expects($this->once())
            ->method('getPostValue')
            ->willReturn(['general'=>'aaaaaa']);

        $this->resultRedirectFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->resultRedirectMock);

        $this->resultRedirectMock->expects($this->once())
            ->method('setPath')
            ->with('mastering/index/index')
            ->willReturnSelf();

        $this->itemMock->expects($this->once())
            ->method('setData')
            ->with('aaaaaa')
            ->willReturnSelf();

        $this->itemMock->expects($this->once())
            ->method('save')
            ->willReturnSelf();

        $result = $this->save->execute();
        $this->assertEquals($this->resultRedirectMock, $result);
    }
}
