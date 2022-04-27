<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Array keys.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrKeys extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * @var array|Arrayable $arrayable
     */
    private array|Arrayable $arr;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @return ArrKeys
     */
    public static function new(array|Arrayable $arr): ArrKeys
    {
        return new self($arr);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     */
    public function __construct(array|Arrayable $arr)
    {
        $this->arr = $arr;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return array_keys(...$this->arrayableOverloaded($this->arr));
    }
}