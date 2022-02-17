<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\OverloadedElephant\Overloadable;

trait ArrayableOverloaded
{
    use Overloadable;

    /**
     * @throws Exception
     */
    private function arrayableOverloaded(array|Arrayable ...$args): array
    {
        return $this->overload($args, [[
            'array',
            Arrayable::class => fn(Arrayable $arrayable) => $arrayable->asArray()
        ]]);
    }

    /**
     * @throws Exception
     */
    private function firstArrayableOverloaded(array|Arrayable $arg): array
    {
        return $this->arrayableOverloaded($arg)[0];
    }
}
