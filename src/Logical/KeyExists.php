<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOverloaded;
use Maxonfjvipon\Elegant_Elephant\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Key exists.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class KeyExists implements Logical
{
    use CastMixed, ArrayableOverloaded;

    /**
     * @param mixed $key
     * @param array|Arrayable $arr
     * @return KeyExists
     */
    public static function new(mixed $key, array|Arrayable $arr): KeyExists
    {
        return new self($key, $arr);
    }

    /**
     * Ctor.
     * @param mixed $key
     * @param array|Arrayable $arr
     */
    public function __construct(private mixed $key, private array|Arrayable $arr)
    {
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return array_key_exists($this->castMixed($this->key), $this->firstArrayableOverloaded($this->arr));
    }
}