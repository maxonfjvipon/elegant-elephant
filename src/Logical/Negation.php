<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Negation
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class Negation implements Logical
{
    use LogicalOverloadable;

    /**
     * @param bool|Logical $origin
     * @return Negation
     */
    public static function new(bool|Logical $origin): Negation
    {
        return new self($origin);
    }

    /**
     * Ctor.
     * @param bool|Logical $origin
     */
    public function __construct(private bool|Logical $origin)
    {
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return !$this->firstLogicalOverloaded($this->origin);
    }
}