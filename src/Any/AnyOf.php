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

namespace Maxonfjvipon\ElegantElephant\Any;

use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\EnsureArr;
use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Logic\EnsureLogic;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Num\EnsureNum;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\ElegantElephant\Txt\EnsureTxt;

/**
 * Any of.
 */
final class AnyOf implements Any
{
    use EnsureLogic;
    use EnsureArr;
    use EnsureNum;
    use EnsureTxt;
    use EnsureAny;

    /**
     * @var callable Callback
     */
    private $callback;

    /**
     * Any of number.
     * @param float|int|Num $num Number
     * @return AnyOf self
     */
    final public static function num(float|int|Num $num): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredNumber($num));
    }

    /**
     * Any of array.
     * @param array<mixed>|Arr $arr Array
     * @return AnyOf self
     */
    final public static function arr(array|Arr $arr): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredArray($arr));
    }

    /**
     * Any of text.
     * @param string|Txt $text Text
     * @return AnyOf self
     */
    final public static function text(string|Txt $text): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredString($text));
    }

    /**
     * Any of bool.
     * @param bool|Logic $bool Boolean
     * @return AnyOf self
     */
    final public static function bool(bool|Logic $bool): AnyOf
    {
        return AnyOf::logic($bool);
    }

    /**
     * Any of logic.
     * @param bool|Logic $logic Logic
     * @return AnyOf self
     */
    final public static function logic(bool|Logic $logic): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredBool($logic));
    }

    /**
     * Any of func.
     * @param callable $func Function
     * @param mixed ...$args Function arguments
     * @return AnyOf self
     */
    final public static function func(callable $func, mixed ...$args): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredAnyValue(call_user_func($func, ...$args)));
    }

    /**
     * Any of just value.
     * @param mixed $value Just value
     * @return AnyOf self
     */
    public static function just(mixed $value): AnyOf
    {
        return new AnyOf(fn () => $value);
    }

    /**
     * Ctor.
     * @param callable $func Function
     */
    final private function __construct(callable $func)
    {
        $this->callback = $func;
    }

    final public function value(): mixed
    {
        return call_user_func($this->callback, $this);
    }
}
