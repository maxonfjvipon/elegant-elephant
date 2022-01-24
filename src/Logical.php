<?php

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;

/**
 * Boolean.
 * @package Maxonfjvipon\Elegant_Elephant
 */
interface Logical
{
    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool;
}
