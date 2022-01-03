<?php

namespace ElegantBro\Stringify;

use ElegantBro\Interfaces\Stringify;
use Exception;

final class FromCallable implements Stringify
{
    /**
     * @var callable
     */
    private $callable;

    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * @throws Exception
     * @return string
     */
    public function asString(): string
    {
        return call_user_func($this->callable);
    }
}
