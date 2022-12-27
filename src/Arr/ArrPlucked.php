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

use Maxonfjvipon\ElegantElephant\Any\EnsureAny;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Logic\IsNull;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Pluck an array of values from an array.
 */
final class ArrPlucked extends ArrWrap
{
    use EnsureAny;
    use EnsureArr;

    /**
     * @param array<mixed>|Arr $arr
     * @param string|int|float|Txt|Num $keyOrValue
     * @param string|int|float|Txt|Num|null $key
     */
    public function __construct(
        array|Arr                     $arr,
        string|int|float|Txt|Num      $keyOrValue,
        string|int|float|null|Txt|Num $key = null
    ) {
        parent::__construct(
            new ArrFork(
                condition: new IsNull($key),
                first: $withoutKey = new ArrMapped(
                    arr: $sticky = is_array($arr)
                        ? $arr
                        : new ArrSticky($arr),
                    callback: $this->mapCallback($keyOrValue),
                ),
                second: new ArrCombined(
                    keys: new ArrMapped(
                        $sticky,
                        $this->mapCallback($key)
                    ),
                    values: $withoutKey
                )
            )
        );
    }

    /**
     * @param string|int|float|Txt|Num|null $key
     * @return callable
     */
    private function mapCallback(string|int|float|null|Txt|Num $key): callable
    {
        return function ($item) use ($key) {
            $key = $this->ensuredAnyValue($key);

            return is_object($item) ? $item->{$key} : $item[$key];
        };
    }
}
