<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Mapped arrayable.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrMapped implements Arrayable
{
    use ArrayableOverloaded;

    /**
     * @var array|Arrayable $arrayable
     */
    private array|Arrayable $arr;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param callable $callback
     * @return ArrMapped
     */
    public static function new(array|Arrayable $arr, callable $callback): ArrMapped
    {
        return new self($arr, $callback);
    }

    /**
     * ArrMappedOf constructor.
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
        return array_map($this->callback, $this->firstArrayableOverloaded($this->arr));
    }
}
