<?php

namespace Maxonfjvipon\Elegant_Elephant\Proc;

use Maxonfjvipon\Elegant_Elephant\Func;
use Maxonfjvipon\Elegant_Elephant\Proc;

/**
 * TODO: think about class name
 * ForEach.
 * @package Maxonfjvipon\Elegant_Elephant\Proc
 */
class Through
{
    /**
     * @param callable $callback
     * @return Proc
     */
    public static function withCallable(callable $callback): Proc
    {
        return Through::withProc(ProcOf::callable($callback));
    }

    /**
     * @param Func $func
     * @return Proc
     */
    public static function withFunc(Func $func): Proc
    {
        return Through::withProc(ProcOf::func($func));
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
            public function exec(iterable $args): void
            {
                foreach ($args as $item) {
                    $this->proc->exec($item);
                }
            }
        };
    }
}
