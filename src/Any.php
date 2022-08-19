<?php

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;

/**
 * Any.
 * @package Maxonfjvipon\Elegant_Elephant
 */
interface Any
{
    /**
     * @return mixed
     * @throws Exception
     */
    public function asAny(): mixed;
}