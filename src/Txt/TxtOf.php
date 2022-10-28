<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Any;

/**
 * Text of.
 */
final class TxtOf implements StringableTxt
{
    use TxtToString;
    use EnsureTxt;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Text of number
     *
     * @param float|int $number
     * @return TxtOf
     */
    public static function number(float|int $number): TxtOf
    {
        return TxtOf::str((string) $number);
    }

    /**
     * Text of float.
     *
     * @param  float $float
     * @return TxtOf
     */
    public static function float(float $float): TxtOf
    {
        return TxtOf::str((string) $float);
    }

    /**
     * Text of int.
     *
     * @param  int $int
     * @return TxtOf
     */
    final public static function int(int $int): TxtOf
    {
        return TxtOf::str((string) $int);
    }

    /**
     * Text of num.
     *
     * @param  Num $num
     * @return TxtOf
     */
    final public static function num(Num $num): TxtOf
    {
        return new TxtOf(fn () => (string) $num->asNumber());
    }

    /**
     * Text of string.
     *
     * @param  string $str
     * @return TxtOf
     */
    final public static function str(string $str): TxtOf
    {
        return new TxtOf(fn () => $str);
    }


    /**
     * Text of Any.
     *
     * @param  Any $any
     * @return TxtOf
     */
    final public static function any(Any $any): TxtOf
    {
        return TxtOf::func(fn () => $any->value());
    }

    /**
     * Text of function.
     *
     * @param  callable $func
     * @param  mixed    ...$args
     * @return TxtOf
     */
    final public static function func(callable $func, mixed ...$args): TxtOf
    {
        return new TxtOf(fn (TxtOf $self) => $self->ensuredString(call_user_func($func, ...$args)));
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
     * @return string
     * @throws Exception
     */
    final public function asString(): string
    {
        return (string) call_user_func($this->callback, $this);
    }
}