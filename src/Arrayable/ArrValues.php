<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Arrayable values
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrValues implements Arrayable
{
    use Overloadable;

    /**
     * @var array|Arrayable $arr
     */
    private array|Arrayable $arr;

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
    public function __construct(array|Arrayable $arr)
    {
        $this->arr = $arr;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return array_values(self::overload([$this->arr], [[
            'array',
            Arrayable::class => fn(Arrayable $arr) => $arr->asArray()
        ]])[0]);
    }
}