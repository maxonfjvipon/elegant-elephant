<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable values
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrValues extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @return ArrValues
     */
    public static function new(array|Arrayable $arr): ArrValues
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
    public function asArray(): array
    {
        return array_values($this->firstArrayableOverloaded($this->arr));
    }
}