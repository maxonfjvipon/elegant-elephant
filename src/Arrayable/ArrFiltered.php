<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable filtered of.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrFiltered extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param callable $callback
     * @return ArrFiltered
     */
    public static function new(array|Arrayable $arr, callable $callback): ArrFiltered
    {
        return new self($arr, $callback);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     * @param Closure $callback
     */
    public function __construct(private array|Arrayable $arr, private Closure $callback)
    {
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return array_filter($this->firstArrayableOverloaded($this->arr), $this->callback, ARRAY_FILTER_USE_BOTH);
    }
}