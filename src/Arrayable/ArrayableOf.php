<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Arrayable of.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrayableOf implements Arrayable
{
    use Overloadable, ArrayableOverloaded;

    /**
     * @param mixed ...$array
     * @return ArrayableOf
     */
    public static function items(mixed ...$array): ArrayableOf
    {
        return new self($array);
    }

    /**
     * Ctor wrap.
     * @param array|Any $arr
     * @return ArrayableOf
     */
    public static function new(array|Any $arr): ArrayableOf
    {
        return new self($arr);
    }

    /**
     * Ctor.
     * @param array|Any $arr
     */
    public function __construct(private array|Any $arr)
    {
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        if ($this->arr instanceof Any) {
            if (!is_array($res = $this->arr->asAny())) {
                throw new Exception("Any object must return an array");
            }
            return $res;
        }
        return $this->arr;
    }
}
