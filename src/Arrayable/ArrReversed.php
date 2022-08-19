<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Reversed array
 */
final class ArrReversed extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @return ArrReversed
     */
    public static function new(array|Arrayable $arr): ArrReversed
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
        return array_reverse($this->firstArrayableOverloaded($this->arr));
    }
}