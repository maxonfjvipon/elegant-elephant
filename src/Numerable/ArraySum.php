<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOverloaded;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Sum of array elements.
 * @package Maxonfjvipon\Elegant_Elephant\Numerable
 */
final class ArraySum implements Numerable
{
    use ArrayableOverloaded;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @return ArraySum
     */
    public static function new(array|Arrayable $arr): ArraySum
    {
        return new self($arr);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     */
    public function __construct(private array|Arrayable $arr)
    {
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        return array_sum($this->firstArrayableOverloaded($this->arr));
    }
}