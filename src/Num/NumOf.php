<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2022 Max Trunnikov
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE
 */
declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Num;

/**
 * Number of.
 */
final class NumOf implements Num
{
    use EnsureNum;

    /**
     * @var callable Callback
     */
    private $callback;

    /**
     * Num of int.
     * @param int $int Integer
     */
    final public static function int(int $int): NumOf
    {
        return NumOf::number($int);
    }

    /**
     * Num of float.
     * @param float $float Float
     */
    final public static function float(float $float): NumOf
    {
        return NumOf::func(fn () => $float);
    }

    /**
     * Num of number.
     * @param int|float $number Float or integer
     */
    final public static function number(int|float $number): NumOf
    {
        return NumOf::func(fn () => $number);
    }

    /**
     * Num of Any.
     * @param Any $any Any
     */
    final public static function any(Any $any): NumOf
    {
        return NumOf::func(fn () => $any->value());
    }

    /**
     * Num of function.
     * @param callable $func Function
     * @param mixed ...$args Function arguments
     */
    final public static function func(callable $func, mixed ...$args): NumOf
    {
        return new NumOf(function (NumOf $self) use ($func, $args) {
            /** @var float|int|Num $num */
            $num = call_user_func($func, ...$args);

            return $self->ensuredNumber($num);
        });
    }

    /**
     * Ctor.
     * @param callable $func Function
     */
    final private function __construct(callable $func)
    {
        $this->callback = $func;
    }

    final public function asNumber(): float|int
    {
        /** @var float|int $num */
        $num = call_user_func($this->callback, $this);

        return $num;
    }
}
