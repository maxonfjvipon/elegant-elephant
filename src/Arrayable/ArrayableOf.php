<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable of.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrayableOf implements Arrayable
{
    /**
     * @var array $array
     */
    private array $array;

    /**
     * Ctor wrap.
     * @param array $array
     * @return ArrayableOf
     */
    public static function array(array $array): ArrayableOf
    {
        return new self($array);
    }

    /**
     * Ctor.
     * @param array $arr
     */
    private function __construct(array $arr)
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