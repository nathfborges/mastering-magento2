<?php
namespace Mastering\SampleModule\Api\Data;

interface ItemInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string|null
     */
    public function getDescription(): string;
}
