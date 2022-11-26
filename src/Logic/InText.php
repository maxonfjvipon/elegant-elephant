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

namespace Maxonfjvipon\ElegantElephant\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\ElegantElephant\Txt\EnsureTxt;

/**
 * In text.
 */
final class InText implements Logic
{
    use EnsureTxt;

    /**
     * Ctor.
     * @param string|Txt $needle
     * @param string|Txt $haystack
     */
    final public function __construct(private string|Txt $needle, private string|Txt $haystack)
    {
    }

    final public function asBool(): bool
    {
        return str_contains(
            $this->ensuredString($this->haystack),
            $this->ensuredString($this->needle)
        );
    }
}
