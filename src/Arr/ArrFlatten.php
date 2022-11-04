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
use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Flatten array.
 */
final class ArrFlatten extends ArrWrap
{
    use EnsureArr;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arr $arr
     */
    final public function __construct(array|Arr $arr, int $deep = 1)
    {
        parent::__construct(
            ArrOf::func(fn () => $this->flat($this->ensuredArray($arr), [], $deep))
        );
    }

    /**
     * @param  array<mixed> $arr
     * @param  array<mixed> $new
     * @return array<mixed>
     * @throws Exception
     */
    private function flat(array $arr, array $new, int $neededDeep, int $currentDeep = 0): array
    {
        foreach ($arr as $item) {
            if ($neededDeep !== $currentDeep && (is_array($item) || $item instanceof Arr)) {
                $new = $this->flat($this->ensuredArray($item), $new, $neededDeep, $currentDeep + 1);
            } else {
                $new[] = $item;
            }
        }

        return $new;
    }
}
