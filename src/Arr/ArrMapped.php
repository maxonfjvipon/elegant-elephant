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

use Closure;
use Exception;
use Maxonfjvipon\ElegantElephant\Any\EnsureAny;
use Maxonfjvipon\ElegantElephant\Arr;
use ReflectionFunction;

/**
 * Mapped array.
 */
final class ArrMapped extends ArrWrap
{
    use EnsureArr;
    use EnsureAny;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arr $arr
     */
    final public function __construct(array|Arr $arr, callable $callback, bool $ensure = false)
    {
        parent::__construct(
            ArrOf::func(
                function () use ($arr, $callback, $ensure) {
                    $count = (new ReflectionFunction(Closure::fromCallable($callback)))->getNumberOfParameters();

                    if ($count < 1 || $count > 2) {
                        throw new Exception("Invalid amount of arguments");
                    }

                    $array = $this->ensuredArray($arr);

                    $arrays = ($isTwo = $count === 2) ? [array_keys($array), $array] : [$array];

                    return array_map(
                        $ensure
                        ? ($isTwo
                            ? fn ($key, $value) => $this->ensuredAnyValue(call_user_func($callback, $key, $value))
                            : fn ($value) => $this->ensuredAnyValue(call_user_func($callback, $value)))
                        : $callback,
                        ...$arrays
                    );
                }
            )
        );
    }
}
