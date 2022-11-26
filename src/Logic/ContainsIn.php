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

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Contains in.
 */
final class ContainsIn extends LogicWrap
{
    /**
     * Ctor.
     * @param string|array<mixed>|Txt|Arr $container
     */
    final public function __construct(mixed $needle, string|array|Txt|Arr $container)
    {
        parent::__construct(
            new LogicCond(
                is_string($container) || $container instanceof Txt,
                LogicOf::func(fn () => new InText($needle, $container)), /** @phpstan-ignore-line */
                LogicOf::func(fn () => new InArray($needle, $container)) /** @phpstan-ignore-line */
            )
        );
    }
}
