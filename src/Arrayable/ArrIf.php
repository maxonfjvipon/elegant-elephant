<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Represents {@see Arrayable} if {@code $cond} is TRUE
 * [] otherwise
 */
final class ArrIf extends ArrEnvelope
{
    /**
     * Ctor wrap.
     * @param bool|Logical $cond
     * @param array|Closure|Arrayable $arr
     * @return ArrIf
     */
    public static function new(bool|Logical $cond, array|Closure|Arrayable $arr): ArrIf
    {
        return new self($cond, $arr);
    }

    /**
     * Ctor.
     * @param bool|Logical $condition
     * @param array|Closure|Arrayable $arr
     */
    public function __construct(bool|Logical $condition, array|Closure|Arrayable $arr)
    {
        parent::__construct(
            new ArrTernary(
                $condition,
                $arr,
                []
            )
        );
    }
}
