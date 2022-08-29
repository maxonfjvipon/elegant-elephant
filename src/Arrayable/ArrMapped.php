<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\CastMixed;
use Opis\Closure\SerializableClosure;

/**
 * Mapped arrayable.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrMapped extends ArrayableIterable
{
    use ArrayableOverloaded, CastMixed;

    /**
     * @var SerializableClosure $callback
     */
    private SerializableClosure $callback;

    /**
     * Ctor wrap.
     * @param array|Arrayable $arr
     * @param callable $callback
     * @param bool $cast
     * @return ArrMapped
     */
    public static function new(array|Arrayable $arr, callable $callback, bool $cast = false): ArrMapped
    {
        return new self($arr, $callback, $cast);
    }

    /**
     * ArrMappedOf constructor.
     * @param array|Arrayable $arr
     * @param callable $callback
     * @param bool $cast
     */
    public function __construct(
        private array|Arrayable $arr,
        callable $callback,
        private bool $cast = false
    ) {
        $this->callback = new SerializableClosure($callback);
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        if (!$this->cast) {
            return array_map($this->callback, $this->firstArrayableOverloaded($this->arr));
        } else {
            $res = [];
            foreach ($this->firstArrayableOverloaded($this->arr) as $key => $value) {
                $res[$key] = $this->castMixed(call_user_func($this->callback, $value));
            }
            return $res;
        }
    }
}
