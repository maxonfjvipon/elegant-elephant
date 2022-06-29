<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable overloading
 */
trait ArrayableOverloaded
{
    /**
     * @throws Exception
     */
    private function arrayableOverloaded(array|Arrayable ...$args): array
    {
        return array_map(
            fn(array|Arrayable $arg) => is_array($arg) ? $arg : $arg->asArray(),
            $args
        );
    }

    /**
     * @throws Exception
     */
    private function firstArrayableOverloaded(array|callable|Arrayable $arg): array
    {
        if (is_callable($arg)) {
            return $this->firstArrayableOverloaded(call_user_func($arg));
        }
        return is_array($arg) ? $arg : $arg->asArray();
    }
}
