<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
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
        return array_map(
            fn(array|Arrayable $arg) => is_array($arg) ? $arg : $arg->asArray(),
            $args
        );
    }

    /**
     * @throws Exception
     */
    private function firstArrayableOverloaded(array|callable|Arrayable $arg): array
    {
        if (is_callable($arg)) {
            $arr = call_user_func($arg);
            if (is_array($arr)) {
                return $arg;
            }
            if ($arr instanceof Arrayable) {
                return $arr->asArray();
            }
            throw new Exception("Callback must return an array or an instance of Arrayable");
        }
        return $this->arrayableOverloaded($arg)[0];
    }
}
