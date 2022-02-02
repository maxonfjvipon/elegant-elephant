<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\OverloadedElephant\Overloadable;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

/**
 * Arrayable filtered of.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrFiltered implements Arrayable
{
    use Overloadable;

    /**
     * @var array|Arrayable $arrayable
     */
    private Arrayable|array $arr;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param callable $callback
     * @return ArrFiltered
     */
    public static function new(array|Arrayable $arr, callable $callback): ArrFiltered
    {
        return new self($arr, $callback);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     * @param callable $callback
     */
    public function __construct(array|Arrayable $arr, callable $callback)
    {
        $this->arr = $arr;
        $this->callback = $callback;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return array_filter(self::overload([$this->arr], [[
            'array',
            Arrayable::class => fn(Arrayable $arr) => $arr->asArray()
        ]])[0], $this->callback, ARRAY_FILTER_USE_BOTH);
    }
}