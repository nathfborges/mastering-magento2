<?php

namespace Mastering\SampleModule\Test\Unit\Model;

use Mastering\SampleModule\Model\ItemRepository;
use Mastering\SampleModule\Model\ResourceModel\Item\Collection;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;
use PHPUnit\Framework\TestCase;

class ItemRepositoryTest extends TestCase
{
    private $itemRepository;
    private $collectionMock;
    private $collectionFactoryMock;

    protected function setUp(): void
    {
        $this->collectionFactoryMock = $this->createMock(CollectionFactory::class);
        $this->collectionMock = $this->createMock(Collection::class);
        $this->itemRepository = new ItemRepository($this->collectionFactoryMock);
    }

    public function testGetList()
    {
        $this->collectionFactoryMock->method('create')->willReturn($this->collectionMock);
        $this->collectionMock->method('getItems')->willReturn(array(3, 8, 4, 7, 3, 4));
        $this->assertIsArray($this->itemRepository->getList());
        $this->assertCount(6, $this->itemRepository->getList());
    }
}
