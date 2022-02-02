<?php

namespace Maxonfjvipon\Elegant_Elephant\Func;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Func;
use Maxonfjvipon\Elegant_Elephant\Proc;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * FuncOf.
 * @package Maxonfjvipon\Elegant_Elephant\Func
 */
final class FuncOf implements Func
{
    use Overloadable;

    /**
     * @var Closure|Func|Proc|callable $function
     */
    private $function;

    /**
     * Ctor wrap.
     * @param Func|Proc|Closure|callable $function
     * @return FuncOf
     */
    public static function new(Func|Proc|Closure|callable $function): FuncOf
    {
        return new self($function);
    }

    /**
     * Ctor.
     * @param Func|Proc|Closure|callable $func
     */
    public function __construct(Func|Proc|Closure|callable $func)
    {
        $this->function = $func;
    }

    /**
     * @inheritDoc
     */
    public function apply(iterable $args = []): mixed
    {
        return call_user_func(...self::overload([$this->function], [[
            'callable',
            Closure::class,
            Proc::class => fn(Proc $proc) => fn(...$args) => $proc->exec(...$args),
            Func::class => fn(Func $func) => fn(...$args) => $func->apply(...$args),
        ]]), ...$args);
    }
}