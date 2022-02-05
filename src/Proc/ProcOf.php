<?php

namespace Maxonfjvipon\Elegant_Elephant\Proc;

use Closure;
use Exception;
use Maxonfjvipon\Elegant_Elephant\Func;
use Maxonfjvipon\Elegant_Elephant\Proc;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Proc of.
 * @package Maxonfjvipon\Elegant_Elephant\Proc
 */
final class ProcOf implements Proc
{
    use Overloadable;

    /**
     * @var Func|Closure|callable $callback
     */
    private $function;

    /**
     * @param Func|Closure|callable $func
     * @return ProcOf
     */
    public static function new(Func|Closure|callable $func): ProcOf
    {
        return new self($func);
    }

    /**
     * ProcOf constructor.
     * @param Func|Closure|callable $func
     */
    public function __construct(Func|Closure|callable $func)
    {
        $this->function = $func;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function exec(iterable $args = []): void
    {
        call_user_func($this->overload([$this->function], [[
            'callable',
            Closure::class,
            Func::class => fn(Func $func) => fn(...$args) => $func->apply(...$args)
        ]])[0], ...$args);
    }
}