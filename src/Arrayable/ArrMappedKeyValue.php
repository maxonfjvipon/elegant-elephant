<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Array mapped with key and value handling
 */
final class ArrMappedKeyValue extends ArrayableIterable
{
    use ArrayableOverloaded;

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
     * @param Closure $callback
     */
    public function __construct(private array|Arrayable $arr, private Closure $callback)
    {
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
