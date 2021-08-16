<?php
namespace Mastering\SampleModule\Test\Unit\Model;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Mastering\SampleModule\Model\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    private Config $config;
    private $scopeConfigInterfaceMock;

    protected function setUp(): void
    {
        $this->scopeConfigInterfaceMock = $this->getMockForAbstractClass(ScopeConfigInterface::class);
        $this->config = new Config($this->scopeConfigInterfaceMock);
    }

    public function testIsEnabled()
    {
        $this->scopeConfigInterfaceMock->method('getValue')
            ->with(Config::XML_PATH_ENABLED)
            ->willReturn(true);
        $this->assertTrue($this->config->isEnabled());
    }
}
