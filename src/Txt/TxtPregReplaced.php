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

use Maxonfjvipon\ElegantElephant\Any\EnsureAny;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Preg replaced text.
 */
final class TxtPregReplaced extends TxtWrap
{
    use EnsureAny;

    /**
     * Ctor.
     * @param string|array<string>|Txt $pattern Regex pattern(s)
     * @param string|array<string>|Txt $replacement Text(s) to replace
     * @param string|array<string>|Txt $subject Text(s) to search and replace.
     */
    final public function __construct(
        string|array|Txt $pattern,
        string|array|Txt $replacement,
        string|array|Txt $subject
    ) {
        parent::__construct(
            TxtOf::func(
                function () use ($pattern, $replacement, $subject) {
                    /** @var string|array<string> $pattern */
                    $pattern = $this->ensuredAnyValue($pattern);
                    /** @var string|array<string> $replacement */
                    $replacement = $this->ensuredAnyValue($replacement);
                    /** @var string|array<string> $subject */
                    $subject = $this->ensuredAnyValue($subject);

                    return preg_replace($pattern, $replacement, $subject);
                }
            )
        );
    }
}
