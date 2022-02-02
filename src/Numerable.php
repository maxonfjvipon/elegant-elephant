<?php

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;
use TypeError;

/**
 * Numerable.
 * @package Maxonfjvipon\Elegant_Elephant
 */
interface Numerable
{
    /**
     * @return float|int
     * @throws Exception
     * @throws TypeError
     */
    public function asNumber(): float|int;
}