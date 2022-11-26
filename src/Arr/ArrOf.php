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

namespace Maxonfjvipon\ElegantElephant\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Array of.
 */
final class ArrOf implements IterableArr
{
    use HasArrIterator;
    use EnsureArr;

    /**
     * @var callable
     */
    private $callback;

    /**
     * @param  mixed ...$items
     */
    final public static function items(...$items): ArrOf
    {
        return new ArrOf(fn () => $items);
    }

    /**
     * Ctor.
     *
     * @param  array<mixed> $array
     */
    final public static function array(array $array): ArrOf
    {
        return new ArrOf(fn () => $array);
    }

    /**
     * Arr of Any.
     */
    final public static function any(Any $any): ArrOf
    {
        return ArrOf::func(fn () => $any->value());
    }

    /**
     * Array of function.
     */
    final public static function func(callable $func, mixed ...$args): ArrOf
    {
        return new ArrOf(function (ArrOf $self) use ($func, $args) {
            /** @var array<mixed>|Arr $arr */
            $arr = call_user_func($func, ...$args);

            return $self->ensuredArray($arr);
        });
    }

    /**
     * Ctor.
     */
    final private function __construct(callable $func)
    {
        $this->callback = $func;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    final public function asArray(): array
    {
        return (array) call_user_func($this->callback, $this);
    }
}
