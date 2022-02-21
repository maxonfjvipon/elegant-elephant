<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Numerable overloaded.
 */
trait NumerableOverloaded
{
    use Overloadable;

    /**
     * @throws Exception
     */
    private function numerableOverloaded(float|int|Numerable ...$args): array
    {
        return $this->overload($args, [[
            'double',
            'integer',
            Numerable::class => fn(Numerable $num) => $num->asNumber()
        ]]);
    }

    /**
     * @throws Exception
     */
    private function firstNumerableOverloaded(float|int|Numerable $arg): float|int
    {
        return $this->numerableOverloaded($arg)[0];
    }
}