<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Numerable cast.
 */
trait CastNumerable
{
    /**
     * @param float|int|Numerable ...$args
     * @return array<float|int>
     * @throws Exception
     */
    private function numerablesCast(...$args): array
    {
        return array_map(
            fn ($arg) => $this->numerableCast($arg),
            $args
        );
    }

    /**
     * @param float|int|callable|Numerable $arg
     * @return float|int
     * @throws Exception
     */
    private function numerableOrCallableCast($arg)
    {
        if (is_callable($arg)) {
            return $this->numerableOrCallableCast(call_user_func($arg));
        }

        return $this->numerableCast($arg);
    }

    /**
     * @param float|int|Numerable $arg
     * @return float|int
     * @throws Exception
     */
    private function numerableCast($arg)
    {
        return is_integer($arg) || is_float($arg) ? $arg : $arg->asNumber();
    }
}
