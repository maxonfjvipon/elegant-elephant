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

namespace Maxonfjvipon\ElegantElephant\Support;

use PHPUnit\Framework\Constraint\Constraint;

/**
 * Constraint wrap.
 */
abstract class ConstraintWrap extends Constraint
{
    /**
     * @param Constraint $constraint
     */
    public function __construct(private Constraint $constraint)
    {
    }

    /**
     * @param mixed $other
     * @param string $description
     * @param bool $returnResult
     * @return bool|null
     */
    public function evaluate($other, string $description = '', bool $returnResult = \false): ?bool
    {
        return $this->constraint->evaluate($other, $description, $returnResult);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->constraint->toString();
    }
}
