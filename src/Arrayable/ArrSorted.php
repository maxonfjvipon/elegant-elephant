<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable sorted
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrSorted extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * @var string|callable|null $compare
     */
    private $compare;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param callable|string|null $compare
     * @return ArrSorted
     */
    public static function new(array|Arrayable $arr, callable|string|null $compare = null): ArrSorted
    {
        return new self($arr, $compare);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     * @param callable|string|null $compare
     */
    public function __construct(private array|Arrayable $arr, callable|string|null $compare = null)
    {
        $this->compare = $compare;
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
