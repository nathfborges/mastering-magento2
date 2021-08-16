<?php

namespace Mastering\SampleModule\Test\Unit\Cron;

use Mastering\SampleModule\Cron\AddItem;
use Mastering\SampleModule\Model\Item;
use Mastering\SampleModule\Model\Config;
use Mastering\SampleModule\Model\ItemFactory;
use PHPUnit\Framework\TestCase;

class AddItemTest extends TestCase
{
    private $addItem;
    private $itemFactoryMock;
    private $itemMock;
    private $configMock;


    protected function setUp(): void
    {
        $this->itemFactoryMock = $this->createMock(ItemFactory::class);
        $this->configMock = $this->createMock(Config::class);
        $this->itemMock = $this->getMockBuilder(Item::class)
            ->disableOriginalConstructor()
            ->addMethods(['setItem', 'setPeso', 'setCodigo_produto', 'setEstoque'])
            ->onlyMethods(['save'])
            ->getMock();

        $this->addItem = new AddItem($this->itemFactoryMock, $this->configMock);
    }

    /**
     * @dataProvider executeDataProvider()
     */
    public function testExecute($boolIsEnabled, $expectsCreate, $expectsSave)
    {
        $this->itemMock->method('setItem')->with('Sabonete')->willReturn($this->itemMock);
        $this->itemMock->method('setPeso')->with('200')->willReturn($this->itemMock);
        $this->itemMock->method('setCodigo_produto')->with('38620')->willReturn($this->itemMock);
        $this->itemMock->method('setEstoque')->with(78)->willReturn($this->itemMock);

        $this->configMock->expects($this->once())
            ->method('isEnabled')
            ->willReturn($boolIsEnabled);

        $this->itemFactoryMock->expects($expectsCreate)
            ->method('create')
            ->willReturn($this->itemMock);

        $this->itemMock->expects($expectsSave)
            ->method('save')
            ->willReturnSelf();

        $this->addItem->execute();
    }

    /**
     * @codeCoverageIgnore
     */
    public function executeDataProvider()
    {
        return [
            'IsEnabledAndExecute' => [
                'boolIsEnabled' => true,
                'expectsCreate' => $this->once(),
                'expectsSave' => $this->once()
            ],

            'IsDisabledAndNotExecute' => [
                'boolIsEnabled' => false,
                'expectsCreate' => $this->never(),
                'expectsSave' => $this->never()
            ],

            'IsEmptyAndNotExecute' => [
                'boolIsEnabled' => '',
                'expectsCreate' => $this->never(),
                'expectsSave' => $this->never()
            ],

//            'Error' => [
//                'boolIsEnabled' => true,
//                'expectsCreate' => $this->never(),
//                'expectsSave' => $this->once()
//            ],
        ];
    }
}
