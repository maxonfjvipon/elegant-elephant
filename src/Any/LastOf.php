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

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Last of.
 */
final class LastOf implements Any
{
    use EnsureAny;

    /**
     * Last of text.
     * @param string|Txt $text Text
     */
    final public static function text(string|Txt $text): LastOf
    {
        return new LastOf($text);
    }

    /**
     * Last of array.
     * @param array<mixed>|Arr $arr Array
     */
    final public static function arr(array|Arr $arr): LastOf
    {
        return new LastOf($arr);
    }

    /**
     * Ctor.
     * @param string|array<mixed>|Txt|Arr|Any $container Container to get last element from
     */
    final public function __construct(private string|array|Txt|Arr|Any $container)
    {
    }

    public function value(): mixed
    {
        $value = $this->ensuredAnyValue($this->container);

        if (is_string($value)) {
            if (empty($value)) {
                throw new Exception("Can't get the last element of an empty string");
            }

            $res = substr($value, -1);
        } elseif (is_array($value)) {
            if (empty($value)) {
                throw new Exception("Can't get the last element of an empty array");
            }

            $res = $value[count($value) - 1];
        } else {
            throw new Exception("The element to get the last element from must be an array or string");
        }

        return $res;
    }
}
