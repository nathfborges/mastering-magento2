<?php
namespace Mastering\SampleModule\Test\Unit\Plugin;
use Mastering\SampleModule\Plugin\Logger;
use PHPUnit\Framework\TestCase;
use Mastering\SampleModule\Console\Command\AddItem;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoggerTest extends TestCase
{
    private $outputInterfaceMock;
    private $inputInterfaceMock;
    private $addItemMock;
    private $logger;
    protected function setUp(): void
    {
        $this->outputInterfaceMock = $this->getMockForAbstractClass(OutputInterface::class);;
        $this->inputInterfaceMock = $this->getMockForAbstractClass(InputInterface::class);
        $this->addItemMock = $this->createMock(AddItem::class);
        $this->logger = new Logger();
    }
    public function testBeforeRun()
    {
        $this->outputInterfaceMock
            ->expects($this->once())
            ->method('writeln')
            ->with('beforeExecute');
        $this->logger->beforeRun($this->addItemMock, $this->inputInterfaceMock, $this->outputInterfaceMock);
    }
    public function testAfterRun()
    {
        $this->outputInterfaceMock
            ->expects($this->once())
            ->method('writeln')
            ->with('afterExecute');
        $this->logger->afterRun($this->addItemMock, [], $this->inputInterfaceMock, $this->outputInterfaceMock);
    }
}
