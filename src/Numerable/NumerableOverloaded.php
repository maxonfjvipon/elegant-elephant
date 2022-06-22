<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
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
    private function numerableOverloaded(float|int|Numerable|Any ...$args): array
    {
        return $this->overload($args, [[
            'double',
            'integer',
            Numerable::class => fn(Numerable $num) => $num->asNumber(),
            Any::class => fn(Any $any) => $this->firstNumerableOverloaded($any->asAny())
        ]]);
    }

    /**
     * @throws Exception
     */
    private function firstNumerableOverloaded(float|int|Numerable|Any $arg): float|int
    {
        return $this->numerableOverloaded($arg)[0];
    }
}