<?php

namespace Mastering\SampleModule\Test\Unit\Observer;

use Magento\Framework\Event;
use Magento\Framework\Event\Observer;
use Mastering\SampleModule\Observer\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class LoggerTest extends TestCase
{
    private $loggerInterfaceMock;
    private $logger;
    private $observerMock;
    private $eventMock;

    protected function setUp(): void
    {
        $this->eventMock = $this->createMock(Event::class);
        $this->observerMock = $this->createMock(Observer::class);
        $this->loggerInterfaceMock = $this->createMock(LoggerInterface::class);
        $this->logger = new Logger($this->loggerInterfaceMock);
    }

    public function testExecute()
    {
        $this->observerMock->expects($this->exactly(2))
            ->method('getEvent')
            ->willReturn($this->eventMock);
        $this->eventMock->expects($this->exactly(2))
            ->method('getName')
            ->willReturn('teste skate');

        $this->loggerInterfaceMock->expects($this->once())
            ->method('debug')
            ->with($this->observerMock->getEvent()->getName());

        $this->logger->execute($this->observerMock);
    }

}
