<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Logical ternary.
 */
final class LogicalTernary implements Logical
{
    use LogicalOverloadable;

    /**
     * Ctor.
     * @param bool|Logical $condition
     * @param bool|Logical|\Closure $first
     * @param bool|Logical|\Closure $alt
     */
    public function __construct(
        private bool|Logical $condition,
        private bool|Logical|\Closure $first,
        private bool|Logical|\Closure $alt,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return $this->firstLogicalOverloaded($this->condition)
            ? $this->firstLogicalOverloaded($this->first)
            : $this->firstLogicalOverloaded($this->alt);
    }
}
