<?php

namespace Maxonfjvipon\Elegant_Elephant\Proc;

use Maxonfjvipon\Elegant_Elephant\Func;
use Maxonfjvipon\Elegant_Elephant\Proc;

/**
 * Proc of.
 * @package Maxonfjvipon\Elegant_Elephant\Proc
 */
final class ProcOf implements Proc
{
    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * @param Func $func
     * @return ProcOf
     */
    public static function func(Func $func): ProcOf
    {
        return ProcOf::callable(static fn(mixed ...$args) => $func->apply(...$args));
    }

    /**
     * @param callable $callback
     * @return ProcOf
     */
    public static function callable(callable $callback): ProcOf
    {
        return new self($callback);
    }

    /**
     * ProcOf constructor.
     * @param callable $callback
     */
    private function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @inheritDoc
     */
    public function exec(iterable $args = []): void
    {
        call_user_func($this->callback, ...$args);
    }
}