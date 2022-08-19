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
     * @param callable $callback
     * @return ArrFromCallback
     */
    public static function new(callable $callback): ArrFromCallback
    {
        return new self($callback);
    }

    /**
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
