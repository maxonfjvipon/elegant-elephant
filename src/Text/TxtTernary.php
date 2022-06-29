<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Logical\LogicalOverloadable;
use Maxonfjvipon\Elegant_Elephant\Text;

final class TxtTernary implements Text
{
    use TxtOverloadable, LogicalOverloadable;

    /**
     * @param Logical|bool $condition
     * @param string|Text|callable $original
     * @param string|Text|callable $alt
     * @return TxtTernary
     */
    public static function new(
        Logical|bool         $condition,
        string|Text|callable $original,
        string|Text|callable $alt
    ): TxtTernary
    {
        return new self($condition, $original, $alt);
    }

    /**
     * Ctor.
     * @param Logical|bool $condition
     * @param string|Text|Closure $original
     * @param string|Text|Closure $alt
     */
    public function __construct(
        private Logical|bool        $condition,
        private string|Text|Closure $original,
        private string|Text|Closure $alt
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->firstLogicalOverloaded($this->condition)
            ? $this->firstTxtOverloaded($this->original)
            : $this->firstTxtOverloaded($this->alt);
    }
}
