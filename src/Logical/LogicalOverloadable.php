<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\OverloadedElephant\Overloadable;

trait LogicalOverloadable
{
    use Overloadable;

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
            $bool = call_user_func($arg);
            if (is_bool($bool)) {
                return $bool;
            }
            if ($bool instanceof Logical) {
                return $bool->asBool();
            }
            throw new Exception("Callback must return a bool");
        }
        return $this->logicalOverloaded($arg)[0];
    }
}
