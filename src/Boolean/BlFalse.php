<?php

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;

/**
 * Boolean false.
 * @package Maxonfjvipon\Elegant_Elephant\Boolean
 */
class BlFalse implements Boolean
{
    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return false;
    }
}