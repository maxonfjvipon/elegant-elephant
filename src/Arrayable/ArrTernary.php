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
     * @var bool|Logical $condition
     */
    private Logical|bool $condition;

    /**
     * @var array|Closure|Arrayable $origin
     */
    private array|Closure|Arrayable $origin;

    /**
     * @var array|Closure|Arrayable $alt
     */
    private array|Closure|Arrayable $alt;

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
    ): ArrTernary {
        return new self($cond, $first, $alt);
    }

    /**
     * Ctor.
     * @param Logical|bool $cond
     * @param array|callable|Arrayable $first
     * @param array|callable|Arrayable $alt
     */
    public function __construct(Logical|bool $cond, array|callable|Arrayable $first, array|callable|Arrayable $alt)
    {
        $this->condition = $cond;
        $this->origin = $first;
        $this->alt = $alt;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return $this->firstLogicalOverloaded($this->condition)
            ? $this->firstArrayableOverloaded($this->origin)
            : $this->firstArrayableOverloaded($this->alt);
    }
}
