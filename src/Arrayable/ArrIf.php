<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Represents {@see Arrayable} if {@code $cond} is TRUE
 * [] otherwise
 */
final class ArrIf implements Arrayable
{
    /**
     * @var bool|Logical $condition
     */
    private bool|Logical $condition;

    /**
     * @var array|Arrayable $arr
     */
    private array|Arrayable $arr;

    /**
     * Ctor wrap.
     * @param bool|Logical $cond
     * @param array|Arrayable $arr
     * @return ArrIf
     */
    public static function new(bool|Logical $cond, array|Arrayable $arr): ArrIf
    {
        return new self($cond, $arr);
    }

    /**
     * Ctor.
     * @param bool|Logical $cond
     * @param array|Arrayable $arr
     */
    public function __construct(bool|Logical $cond, array|Arrayable $arr)
    {
        $this->condition = $cond;
        $this->arr = $arr;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return (new ArrTernary(
            $this->condition,
            $this->arr,
            []
        ))->asArray();
    }
}
