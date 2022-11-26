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
 * First item.
 */
final class FirstOf implements Any
{
    use EnsureAny;

    /**
     * First of text.
     * @param Txt|string $text Text
     * @return FirstOf self
     */
    final public static function text(Txt|string $text): FirstOf
    {
        return new FirstOf($text);
    }

    /**
     * First of array.
     * @param Arr|array<mixed> $arr Array
     * @return FirstOf self
     */
    public static function arr(array|Arr $arr): FirstOf
    {
        return new FirstOf($arr);
    }

    /**
     * Ctor.
     * @param string|Any|Arr|array<mixed>|Txt $container Container to get first element from
     */
    final public function __construct(private string|Any|Arr|array|Txt $container)
    {
    }

    public function value(): mixed
    {
        $value = $this->ensuredAnyValue($this->container);

        if (!is_string($value) && !is_array($value)) {
            throw new Exception("The element to get the first element from must be an array or string");
        }

        if (empty($value)) {
            throw new Exception("Can't get the first element of an empty value");
        }

        return $value[0];
    }
}
