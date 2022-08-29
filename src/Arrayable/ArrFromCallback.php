<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Exception;
use Opis\Closure\SerializableClosure;

/**
 * Array from callback
 */
final class ArrFromCallback extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * @var SerializableClosure $callback
     */
    private SerializableClosure $callback;

    /**
     * @param callable $callback
     * @return ArrFromCallback
     */
    public static function new(callable $callback): ArrFromCallback
    {
        return new self($callback);
    }

    /**
     * Ctor.
     *
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = new SerializableClosure($callback);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->firstArrayableOverloaded($this->callback);
    }
}
