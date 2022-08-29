<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Logical\LogicalOverloadable;

/**
 * Ternary array
 */
final class ArrTernary extends ArrayableIterable
{
    use LogicalOverloadable, ArrayableOverloaded;

    /**
     * Ctor wrap.
     * @param Logical|bool $cond
     * @param array|Closure|Arrayable $first
     * @param array|Closure|Arrayable $alt
     * @return ArrTernary
     */
    public static function new(
        Logical|bool             $cond,
        array|Closure|Arrayable $first,
        array|Closure|Arrayable $alt
    ): ArrTernary
    {
        return new self($cond, $first, $alt);
    }

    /**
     * Ctor.
     * @param Logical|bool $condition
     * @param array|Closure|Arrayable $first
     * @param array|Closure|Arrayable $alt
     */
    public function __construct(
        private Logical|bool     $condition,
        private array|Closure|Arrayable $first,
        private array|Closure|Arrayable $alt
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return $this->firstLogicalOverloaded($this->condition)
            ? $this->firstArrayableOverloaded($this->first)
            : $this->firstArrayableOverloaded($this->alt);
    }
}
