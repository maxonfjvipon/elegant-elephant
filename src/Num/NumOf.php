<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Num;

/**
 * Number of.
 */
final class NumOf implements Num
{
    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Num of int.
     *
     * @param  int $int
     * @return NumOf
     */
    final public static function int(int $int): NumOf
    {
        return NumOf::number($int);
    }

    /**
     * Num of float.
     *
     * @param  float $float
     * @return NumOf
     */
    final public static function float(float $float): NumOf
    {
        return NumOf::func(fn () => $float);
    }

    /**
     * Num of number.
     *
     * @param  int|float $number
     * @return NumOf
     */
    final public static function number(int|float $number): NumOf
    {
        return NumOf::func(fn () => $number);
    }

    /**
     * Num of Any.
     *
     * @param  Any $any
     * @return NumOf
     */
    final public static function any(Any $any): NumOf
    {
        return NumOf::func(fn () => $any->value());
    }

    /**
     * Num of function.
     *
     * @param  callable $func
     * @param  mixed    ...$args
     * @return NumOf
     */
    final public static function func(callable $func, mixed ...$args): NumOf
    {
        return new NumOf(
            function () use ($func, $args) {
                $num = call_user_func($func, ...$args);

                if (!is_int($num) && !is_float($num)) {
                    throw new Exception("Function must return an int or float");
                }

                return $num;
            }
        );
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
     * @return float|int
     * @throws Exception
     */
    final public function asNumber(): float|int
    {
        return call_user_func($this->callback);
    }
}
