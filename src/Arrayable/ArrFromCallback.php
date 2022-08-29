<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
use Exception;

/**
 * Array from callback
 */
final class ArrFromCallback extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * @param Closure $callback
     * @return ArrFromCallback
     */
    public static function new(Closure $callback): ArrFromCallback
    {
        return new self($callback);
    }

    /**
     * Ctor.
     *
     * @param Closure $callback
     */
    public function __construct(private Closure $callback)
    {
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
