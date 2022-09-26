<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Logical cast.
 */
trait CastLogical
{
    /**
     * @param bool|Logical ...$args
     * @return array<bool>
     * @throws Exception
     */
    private function logicalOverloaded(...$args): array
    {
        return array_map(
            fn ($arg) => $this->logicalCast($arg),
            $args
        );
    }

    /**
     * @param bool|callable|Logical $arg
     * @return bool
     * @throws Exception
     */
    private function logicalOrCallableCast($arg): bool
    {
        if (is_callable($arg)) {
            return $this->logicalOrCallableCast(call_user_func($arg));
        }

        return $this->logicalCast($arg);
    }

    /**
     * @param bool|Logical $arg
     * @return bool
     * @throws Exception
     */
    private function logicalCast($arg): bool
    {
        return is_bool($arg) ? $arg : $arg->asBool();
    }
}
