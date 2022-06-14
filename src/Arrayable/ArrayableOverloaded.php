<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Closure;
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
    private function arrayableOrCallableOverloaded(array|callable|Arrayable ...$args): array
    {
        return $this->overload($args, [[
            'array',
            Arrayable::class => fn(Arrayable $arrayable) => $arrayable->asArray(),
            Closure::class => fn(Closure $closure) => $this->firstArrayableOverloaded(call_user_func($closure))
        ]]);
    }

    /**
     * @throws Exception
     */
    private function firstArrayableOverloaded(array|callable|Arrayable $arg): array
    {
        if (is_callable($arg)) {
            $arr = $this->arrayableOrCallableOverloaded($arg)[0];
            if (!is_array($arr)) {
                throw new Exception("Callback must return an array or instance of Arrayable");
            }
            return $arr;
        }
        return $this->arrayableOverloaded($arg)[0];
    }
}
