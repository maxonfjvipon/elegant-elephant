<?php

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;

/**
 * Function.
 * @package Maxonfjvipon\Elegant_Elephant
 */
interface Func
{
    /**
     * @param mixed $input
     * @return mixed
     * @throws Exception
     */
    public function apply(mixed $input): mixed;
}