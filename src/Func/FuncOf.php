<?php

namespace Maxonfjvipon\Elegant_Elephant\Func;

use Maxonfjvipon\Elegant_Elephant\Func;
use Maxonfjvipon\Elegant_Elephant\Proc;

/**
 * FuncOf.
 * @package Maxonfjvipon\Elegant_Elephant\Func
 */
final class FuncOf implements Func
{
    /**
     * @var callable $function
     */
    private $function;

    /**
     * Ctor wrap.
     * @param Proc $proc
     * @return FuncOf
     */
    public static function proc(Proc $proc): FuncOf
    {
        return FuncOf::callable(static fn(mixed ...$args) => $proc->exec(...$args));
    }

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
    public function apply(iterable $args = []): mixed
    {
        return call_user_func($this->function, ...$args);
    }
}