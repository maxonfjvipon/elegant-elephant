<?php

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;

/**
 * Arrayable.
 * @package Maxonfjvipon\Elegant_Elephant
 */
interface Arrayable
{
    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array;
}