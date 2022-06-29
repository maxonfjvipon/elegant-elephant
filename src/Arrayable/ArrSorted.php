<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable sorted
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrSorted extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param callable|string|null $compare
     * @return ArrSorted
     */
    public static function new(array|Arrayable $arr, callable|string $compare = null): ArrSorted
    {
        return new self($arr, $compare);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     * @param Closure|string|null $compare
     */
    public function __construct(private array|Arrayable $arr, private Closure|string|null $compare = null)
    {
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        $arr = $this->firstArrayableOverloaded($this->arr);
        if ($this->compare != null) {
            usort($arr, is_string($this->compare)
                ? fn($a, $b) => $a[$this->compare] <=> $b[$this->compare]
                : $this->compare);
        } else {
            sort($arr);
        }
        return $arr;
    }
}
