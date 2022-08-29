<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

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
     * @var array|callable|Arrayable $first
     */
    private $first;

    /**
     * @var array|callable|Arrayable $alt
     */
    private $alt;

    /**
     * Ctor wrap.
     * @param Logical|bool $cond
     * @param array|callable|Arrayable $first
     * @param array|callable|Arrayable $alt
     * @return ArrTernary
     */
    public static function new(
        Logical|bool             $cond,
        array|callable|Arrayable $first,
        array|callable|Arrayable $alt
    ): ArrTernary
    {
        return new self($cond, $first, $alt);
    }

    /**
     * Ctor.
     * @param Logical|bool $condition
     * @param array|callable|Arrayable $first
     * @param array|callable|Arrayable $alt
     */
    public function __construct(
        private Logical|bool     $condition,
        array|callable|Arrayable $first,
        array|callable|Arrayable $alt
    )
    {
        $this->first = $first;
        $this->alt = $alt;
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
