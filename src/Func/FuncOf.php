<?php

namespace Maxonfjvipon\Elegant_Elephant\Func;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Func;

/**
 * FuncOf.
 * @package Maxonfjvipon\Elegant_Elephant\Func
 */
class FuncOf implements Func
{
    /**
     * @var callable $function
     */
    private $function;

    /**
     * Ctor wrap.
     * @param callable $callback
     * @return FuncOf
     */
    public static function callable(callable $callback): FuncOf
    {
        return new self($callback);
    }

    /**
     * Ctor.
     * @param callable $func
     */
    private function __construct(callable $func)
    {
        $this->function = $func;
    }

    /**
     * @inheritDoc
     */
    public function apply(mixed $input): mixed
    {
        return call_user_func($this->function, $input);
    }
}