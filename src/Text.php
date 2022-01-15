<?php

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;

/**
 * Text.
 * @package Maxonfjvipon\Elegant_Elephant
 */
interface Text
{
    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string;
}