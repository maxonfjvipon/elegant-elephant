<?php

namespace Maxonfjvipon\Elegant_Elephant;

/**
 * Procedure that returns nothing.
 * @package Maxonfjvipon\Elegant_Elephant
 */
interface Proc
{
    /**
     * @param iterable $args
     * @return void
     */
    public function exec(iterable $args = []): void;
}