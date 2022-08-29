<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable sorted by keys.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrSortedByKeys extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * @var callable|null $compare
     */
    private $compare;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param callable|null $compare
     * @return ArrSortedByKeys
     */
    public static function new(array|Arrayable $arr, callable $compare = null): ArrSortedByKeys
    {
        return new self($arr, $compare);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     * @param callable|null $compare
     */
    public function __construct(private array|Arrayable $arr, ?callable $compare = null)
    {
        $this->compare = $compare;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        $arr = $this->firstArrayableOverloaded($this->arr);
        uksort($arr, $this->compare ?? fn($a, $b) => $a <=> $b);

        return $arr;
    }
}
