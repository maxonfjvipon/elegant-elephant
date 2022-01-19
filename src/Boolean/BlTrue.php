<?php

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;

/**
 * Boolean true.
 * @package Maxonfjvipon\Elegant_Elephant\Boolean
 */
class BlTrue implements Boolean
{
    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return true;
    }
}