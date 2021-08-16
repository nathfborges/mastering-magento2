<?php

namespace Mastering\SampleModule\Test\Unit\Block;

use Magento\Framework\App\Http;
use Magento\Framework\View\Element\Template\Context;
use Mastering\SampleModule\Model\ResourceModel\Item\Collection;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;
use Mastering\SampleModule\Block\Hello;
use PHPUnit\Framework\TestCase;

class HelloTest extends TestCase
{
    private $hello;
    private $contextMock;
    private $collectionMock;
    private $collectionFactoryMock;

    protected function setUp(): void
    {
        $this->httpMock = $this->createMock(Http::class);
        $this->collectionMock = $this->createMock(Collection::class);
        $this->contextMock = $this->createMock(Context::class);
        $this->collectionFactoryMock = $this->createMock(CollectionFactory::class);
        $this->hello = new Hello($this->contextMock, $this->collectionFactoryMock, [], $this->httpMock);
    }

    public function testGetItems()
    {
        $this->collectionFactoryMock->method('create')->willReturn($this->collectionMock);
        $this->collectionMock->method('getItems')->willReturn(array(1,2,3));
        $this->assertCount(3, $this->hello->getItemsFront());
    }
}
