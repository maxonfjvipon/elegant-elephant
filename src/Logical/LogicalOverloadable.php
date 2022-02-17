<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

trait LogicalOverloadable
{
    use Overloadable;

    /**
     * @throws Exception
     */
    private function logicalOverloaded(bool|Logical ...$args): array
    {
        return $this->overload($args, [[
            'bool',
            Logical::class => fn(Logical $logical) => $logical->asBool()
        ]]);
    }

    /**
     * @throws Exception
     */
    private function firstLogicalOverloaded(bool|Logical $arg): bool
    {
        return $this->logicalOverloaded($arg)[0];
    }
}
