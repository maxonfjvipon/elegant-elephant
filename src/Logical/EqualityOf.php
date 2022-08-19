<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Equality of.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class EqualityOf implements Logical
{
    use CastMixed;

    /**
     * @param mixed $arg1
     * @param mixed $arg2
     * @return EqualityOf
     */
    public static function new(mixed $arg1, mixed $arg2)
    {
        return new self($arg1, $arg2);
    }

    /**
     * Ctor.
     * @param mixed $arg1
     * @param mixed $arg2
     */
    public function __construct(private mixed $arg1, private mixed $arg2)
    {
    }


    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return $this->castMixed($this->arg1) === $this->castMixed($this->arg2);
    }
}
