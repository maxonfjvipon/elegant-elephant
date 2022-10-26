<?php

namespace Maxonfjvipon\ElegantElephant\Tests;

use PHPUnit\Framework\Constraint\Constraint;

/**
 * Constraint wrap.
 */
class ConstraintWrap extends Constraint
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