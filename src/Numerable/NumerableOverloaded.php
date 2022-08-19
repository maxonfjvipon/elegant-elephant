<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Numerable overloaded.
 */
trait NumerableOverloaded
{
    /**
     * @throws Exception
     */
    private function numerableOverloaded(float|int|Numerable ...$args): array
    {
        return array_map(
            fn(float|int|Numerable $arg) => (is_integer($arg) || is_float($arg)) ? $arg : $arg->asNumber(),
            $args
        );
    }

    /**
     * @throws Exception
     */
    private function firstNumerableOverloaded(float|int|Numerable $arg): float|int
    {
        return (is_integer($arg) || is_float($arg)) ? $arg : $arg->asNumber();
    }
}