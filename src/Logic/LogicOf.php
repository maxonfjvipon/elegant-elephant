<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Logic of.
 */
final class LogicOf implements Logic
{
    use EnsureLogic;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Logic of bool.
     *
     * @param  bool $bool
     * @return LogicOf
     */
    final public static function bool(bool $bool): LogicOf
    {
        return new LogicOf(fn () => $bool);
    }

    /**
     * Logic of any.
     *
     * @param  Any $any
     * @return LogicOf
     */
    final public static function any(Any $any): LogicOf
    {
        return LogicOf::func(fn () => $any->value());
    }

    /**
     * Logic of function.
     *
     * @param  callable $func
     * @param  mixed    ...$args
     * @return LogicOf
     */
    final public static function func(callable $func, mixed ...$args): LogicOf
    {
        return new LogicOf(fn (LogicOf $self) => $self->ensuredBool(call_user_func($func, ...$args)));
    }

    /**
     * Ctor.
     *
     * @param callable $func
     */
    final private function __construct(callable $func)
    {
        $this->callback = $func;
    }

    /**
     * @return bool
     * @throws Exception
     */
    final public function asBool(): bool
    {
        return (bool) call_user_func($this->callback, $this);
    }
}
