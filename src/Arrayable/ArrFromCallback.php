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
     * @var Closure $callback
     */
    private Closure $callback;

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
    public function __construct(Closure $callback)
    {
        $this->callback = $callback;
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
