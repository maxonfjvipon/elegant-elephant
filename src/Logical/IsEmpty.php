<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Is empty.
 */
final class IsEmpty extends LogicalEnvelope
{
    /**
     * @param string|array|Arrayable|Text $value
     * @return IsEmpty
     */
    public static function new(string|array|Arrayable|Text $value)
    {
        return new self($value);
    }

    /**
     * Ctor.
     * @param string|array|Arrayable|Text $value
     */
    public function __construct(string|array|Arrayable|Text $value)
    {
        parent::__construct(
            new LogicalTernary(
                is_string($value),
                fn() => $value === "",
                fn() => new EqualityOf(
                    new LengthOf($value),
                    0
                )
            )
        );
    }
}