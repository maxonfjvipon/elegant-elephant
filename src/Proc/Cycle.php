<?php

namespace Maxonfjvipon\Elegant_Elephant\Proc;

use Maxonfjvipon\Elegant_Elephant\Func;
use Maxonfjvipon\Elegant_Elephant\Proc;

/**
 * ForEach.
 * Experimental.
 * @package Maxonfjvipon\Elegant_Elephant\Proc
 */
final class Cycle
{
    /**
     * @param callable $callback
     * @return Proc
     */
    public static function withCallable(callable $callback): Proc
    {
        return Cycle::withProc(ProcOf::callable($callback));
    }

    /**
     * @param Func $func
     * @return Proc
     */
    public static function withFunc(Func $func): Proc
    {
        return Cycle::withProc(ProcOf::func($func));
    }

    /**
     * @param Proc $proc
     * @return Proc
     */
    public static function withProc(Proc $proc): Proc
    {
        return new class($proc) implements Proc {
            /**
             * @var Proc $proc
             */
            private Proc $proc;

            /**
             * Ctor.
             * @param Proc $proc
             */
            public function __construct(Proc $proc)
            {
                $this->proc = $proc;
            }

            /**
             * @param iterable $args
             */
            public function exec(iterable $args = []): void
            {
                foreach ($args as $item) {
                    $this->proc->exec($item);
                }
            }
        };
    }
}
