<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable unique.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrUnique extends ArrEnvelope
{
    use ArrayableOverloaded;

    /**
     * @var array|Arrayable $arr
     */
    private array|Arrayable $arr;

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
    public function __construct(array|Arrayable $arr)
    {
        $this->arr = $arr;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return array_unique($this->firstArrayableOverloaded($this->arr));
    }
}