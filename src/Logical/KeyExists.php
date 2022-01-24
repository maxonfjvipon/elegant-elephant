<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Key exists.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class KeyExists implements Logical
{
    /**
     * @var Arrayable $arr
     */
    private Arrayable $arr;

    /**
     * @var mixed $key
     */
    private mixed $key;

    /**
     * @param mixed $key
     * @param array $array
     * @return KeyExists
     */
    public static function inArray(mixed $key, array $array): KeyExists
    {
        return KeyExists::inArryable($key, ArrayableOf::array($array));
    }

    /**
     * @param mixed $key
     * @param Arrayable $arr
     * @return KeyExists
     */
    public static function inArryable(mixed $key, Arrayable $arr): KeyExists
    {
        return new self($key, $arr);
    }

    /**
     * Ctor.
     * @param mixed $key
     * @param Arrayable $arr
     */
    private function __construct(mixed $key, Arrayable $arr)
    {
        $this->key = $key;
        $this->arr = $arr;
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return array_key_exists($this->key, $this->arr->asArray());
    }
}