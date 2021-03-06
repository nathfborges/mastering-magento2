<?php

namespace Mastering\SampleModule\Model;

use Monolog\Logger;
use Magento\Framework\Logger\Handler\Base;

/**
 * @codeCoverageIgnore
 */
class DebugHandler extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/debug_custom.log';

    /**
     * @var int
     */
    protected $loggerType = Logger::DEBUG;
}
