<?php

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;

/**
 * Function that must returns something.
 * @package Maxonfjvipon\Elegant_Elephant
 */
interface Func
{
    /**
     * @param iterable $args
     * @return mixed
     * @throws Exception
     */
    public function apply(iterable $args): mixed;
}