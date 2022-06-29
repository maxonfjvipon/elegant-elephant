<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Logical overloading.
 */
trait LogicalOverloadable
{
    /**
     * @throws Exception
     */
    private function logicalOverloaded(bool|Logical ...$args): array
    {
        return array_map(
            fn(bool|Logical $logical) => is_bool($logical) ? $logical : $logical->asBool(),
            $args
        );
    }

    /**
     * @throws Exception
     */
    private function firstLogicalOverloaded(bool|Logical|callable $arg): bool
    {
        if (is_callable($arg)) {
            return $this->firstLogicalOverloaded(call_user_func($arg));
        }
        return is_bool($arg) ? $arg : $arg->asBool();
    }
}
