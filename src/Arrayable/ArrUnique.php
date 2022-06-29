<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable unique.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrUnique extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @return ArrUnique
     */
    public static function new(array|Arrayable $arr): ArrUnique
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
        return array_unique($this->firstArrayableOverloaded($this->arr));
    }
}