<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Logical\LogicalOverloadable;

/**
 * Ternary array
 */
final class ArrTernary implements Arrayable
{
    use LogicalOverloadable, ArrayableOverloaded;

    /**
     * @var bool|Logical $condition
     */
    private Logical|bool $condition;

    /**
     * @var array|Arrayable $origin
     */
    private array|Arrayable $origin;

    /**
     * @var array|Arrayable $alt
     */
    private array|Arrayable $alt;

    /**
     * Ctor wrap.
     * @param Logical|bool $cond
     * @param array|Arrayable $first
     * @param array|Arrayable $alt
     * @return ArrTernary
     */
    public static function new(Logical|bool $cond, array|Arrayable $first, array|Arrayable $alt)
    {
        return new self($cond, $first, $alt);
    }

    /**
     * Ctor.
     * @param Logical|bool $cond
     * @param array|Arrayable $first
     * @param array|Arrayable $alt
     */
    public function __construct(Logical|bool $cond, array|Arrayable $first, array|Arrayable $alt)
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