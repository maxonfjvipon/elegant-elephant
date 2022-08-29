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
     * @var callable|bool|Logical $first
     */
    private $first;

    /**
     * @var callable|bool|Logical $alt
     */
    private $alt;

    /**
     * Ctor.
     * @param bool|Logical $condition
     * @param bool|Logical|callable $first
     * @param bool|Logical|callable $alt
     */
    public function __construct(
        private bool|Logical $condition,
        bool|Logical|callable $first,
        bool|Logical|callable $alt,
    ) {
        $this->first = $first;
        $this->alt = $alt;
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
