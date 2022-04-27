<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Arrayable sorted by keys.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrSortedByKeys extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * @var array|Arrayable $arr
     */
    private array|Arrayable $arr;

    /**
     * @var callable $compare
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
    public function __construct(array|Arrayable $arr, callable $compare = null)
    {
        $this->arr = $arr;
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