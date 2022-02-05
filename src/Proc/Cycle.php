<?php

namespace Maxonfjvipon\Elegant_Elephant\Proc;

use Closure;
use Exception;
use Maxonfjvipon\Elegant_Elephant\Func;
use Maxonfjvipon\Elegant_Elephant\Proc;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * ForEach.
 * Experimental.
 * @package Maxonfjvipon\Elegant_Elephant\Proc
 */
final class Cycle implements Proc
{
    use Overloadable;

    /**
     * @var Func|Proc|Closure|callable $callback
     */
    private $function;

    /**
     * @param Func|Proc|Closure|callable $func
     * @return Cycle
     */
    public static function new(Func|Proc|Closure|callable $func): Cycle
    {
        return new self($func);
    }

    /**
     * ProcOf constructor.
     * @param Func|Proc|callable $func
     */
    public function __construct(Func|Proc|callable $func)
    {
        $this->function = $func;
    }

    /**
     * @param iterable|array $args
     * @throws Exception
     */
    public function exec(iterable $args = []): void
    {
        foreach ($args as $item) {
            $this->overload([$this->function], [[
                'callable',
                Closure::class,
                Func::class => fn(Func $func) => fn(...$items) => $func->apply([...$items]),
                Proc::class => fn(Proc $proc) => fn(...$items) => $proc->exec([...$items]),
            ]])[0]($item);
        }
    }
}
