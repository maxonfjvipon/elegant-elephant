<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Mapped arrayable.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrMapped extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param callable $callback
     * @return ArrMapped
     */
    public static function new(array|Arrayable $arr, callable $callback): ArrMapped
    {
        return new self($arr, $callback);
    }

    /**
     * ArrMappedOf constructor.
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
        return array_map($this->callback, $this->firstArrayableOverloaded($this->arr));
    }
}
