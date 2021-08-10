<?php

namespace Mastering\SampleModule\Api\Data;

interface ItemInterface
{
    /** @return strings */
    public function getName();

    /** @return string|null */
    public function getDescription();
}
