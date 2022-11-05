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

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\EnsureArr;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\ElegantElephant\Txt\EnsureTxt;

/**
 * Length.
 */
final class LengthOf extends NumWrap
{
    use EnsureTxt;
    use EnsureArr;

    /**
     * Ctor.
     * @param string|array<mixed>|Txt|Arr $arg Container to get length of
     */
    final public function __construct(string|array|Txt|Arr $arg)
    {
        parent::__construct(
            new NumCond(
                is_array($arg) || $arg instanceof Arr,
                NumOf::func(fn () => count($this->ensuredArray($arg))), /** @phpstan-ignore-line */
                NumOf::func(fn () => strlen($this->ensuredString($arg))) /** @phpstan-ignore-line */
            )
        );
    }
}
