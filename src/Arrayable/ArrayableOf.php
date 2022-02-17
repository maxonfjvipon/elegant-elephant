<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Arrayable of.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrayableOf implements Arrayable
{
    use Overloadable;

    /**
     * @var array $array
     */
    private array $array;

    /**
     * @param mixed ...$items
     * @return ArrayableOf
     */
    public static function items(...$items): ArrayableOf
    {
        return new self($items);
    }

    /**
     * @param array $arr
     * @return ArrayableOf
     */
    public static function array(array $arr): ArrayableOf
    {
        return new self($arr);
    }

    /**
     * Ctor.
     * @param array $arr
     */
    public function __construct(array $arr)
    {
        $this->array = $arr;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return $this->array;
    }
}