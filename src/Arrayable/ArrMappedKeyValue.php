<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Array mapped with key and value handling
 */
final class ArrMappedKeyValue extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * @var array|Arrayable $arrayable
     */
    private array|Arrayable $arr;

    /**
     * @var callable $callback;
     */
    private $callback;

    /**
     * @param array|Arrayable $arr
     * @param callable $callback
     * @return ArrMappedKeyValue
     */
    public static function new(array|Arrayable $arr, callable $callback): ArrMappedKeyValue
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
        $res = [];
        foreach ($this->firstArrayableOverloaded($this->arr) as $key => $value) {
            $res[] = call_user_func($this->callback, $key, $value);
        }
        return $res;
    }
}
