<?php

namespace Mastering\SampleModule\Test\Controller\Adminhtml\Item;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Mastering\SampleModule\Controller\Adminhtml\Item\NewAction;
use PHPUnit\Framework\TestCase;

class NewActionTest extends TestCase
{
    private $newAction;
    private $contextMock;
    private $resultFactoryMock;
    private $resultInterfaceMock;

    protected function setUp(): void
    {
        $this->contextMock = $this->createMock(Context::class);
        $this->resultFactoryMock = $this->createMock(ResultFactory::class);
        $this->contextMock->method('getResultFactory')->willReturn($this->resultFactoryMock);
        $this->resultInterfaceMock = $this->createMock(ResultInterface::class);
        $this->newAction = new NewAction($this->contextMock);
    }

    public function testExecute()
    {
        $this->resultFactoryMock
            ->method('create')
            ->willReturn($this->resultInterfaceMock);

        $result = $this->newAction->execute();
        $this->assertEquals($this->resultInterfaceMock, $result);
    }


}
