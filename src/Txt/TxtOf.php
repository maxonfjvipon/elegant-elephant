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

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Text of.
 */
final class TxtOf implements StringableTxt
{
    use TxtToString;
    use EnsureTxt;

    /**
     * @var callable Callback
     */
    private $callback;

    /**
     * Text of number
     * @param float|int $number Number
     */
    public static function number(float|int $number): TxtOf
    {
        return TxtOf::str((string) $number);
    }

    /**
     * Text of float.
     * @param float $float Float
     */
    public static function float(float $float): TxtOf
    {
        return TxtOf::str((string) $float);
    }

    /**
     * Text of int.
     * @param int $int Integer
     */
    final public static function int(int $int): TxtOf
    {
        return TxtOf::str((string) $int);
    }

    /**
     * Text of num.
     * @param Num $num Number
     */
    final public static function num(Num $num): TxtOf
    {
        return new TxtOf(fn () => (string) $num->asNumber());
    }

    /**
     * Text of string.
     * @param string $str String
     */
    final public static function str(string $str): TxtOf
    {
        return new TxtOf(fn () => $str);
    }


    /**
     * Text of Any.
     * @param Any $any Any
     */
    final public static function any(Any $any): TxtOf
    {
        return TxtOf::func(fn () => $any->value());
    }

    /**
     * Text of function.
     * @param callable $func Function
     * @param mixed ...$args Function arguments
     */
    final public static function func(callable $func, mixed ...$args): TxtOf
    {
        return new TxtOf(function (TxtOf $self) use ($func, $args) {
            /** @var string|Txt $txt */
            $txt = call_user_func($func, ...$args);

            return $self->ensuredString($txt);
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

    final public function asString(): string
    {
        /** @var string $str */
        $str = call_user_func($this->callback, $this);

        return $str;
    }
}
