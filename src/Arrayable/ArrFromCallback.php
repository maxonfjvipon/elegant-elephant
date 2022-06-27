<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;

/**
 * Array from callback
 */
final class ArrFromCallback extends ArrayableIterable
{
    use ArrayableOverloaded;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * @param callable $callback
     * @return ArrFromCallback
     */
    public static function new(callable $callback): ArrFromCallback
    {
        return new self($callback);
    }

    /**
     * @param callable $callback
     */
    public function __construct(callable $callback)
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
