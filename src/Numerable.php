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
     * @return string
     * @throws Exception|TypeError
     */
    public function asNumber(): string;
}