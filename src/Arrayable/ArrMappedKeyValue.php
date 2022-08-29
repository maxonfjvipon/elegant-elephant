<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\CastMixed;

/**
 * Array mapped with key and value handling
 */
final class ArrMappedKeyValue extends ArrayableIterable
{
    use ArrayableOverloaded, CastMixed;

    /**
     * @param array|Arrayable $arr
     * @param Closure $callback
     * @param bool $cast
     * @return ArrMappedKeyValue
     */
    public static function new(array|Arrayable $arr, Closure $callback, bool $cast = false): ArrMappedKeyValue
    {
        return new self($arr, $callback, $cast);
    }

    /**
     * Ctor.
     * @param array|Arrayable $arr
     * @param Closure $callback
     * @param bool $cast
     */
    public function __construct(private array|Arrayable $arr, private Closure $callback, private bool $cast = false)
    {
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        $res = [];
        if (!$this->cast) {
            foreach ($this->firstArrayableOverloaded($this->arr) as $key => $value) {
                $res[$key] = call_user_func($this->callback, $key, $value);
            }
        } else {
            foreach ($this->firstArrayableOverloaded($this->arr) as $key => $value) {
                $res[$key] = $this->castMixed(call_user_func($this->callback, $key, $value));
            }
        }
        return $res;
    }
}
