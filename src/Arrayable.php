<?php

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;
use IteratorAggregate;

/**
 * Arrayable.
 * @package Maxonfjvipon\Elegant_Elephant
 */
interface Arrayable extends IteratorAggregate
{
    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array;
}