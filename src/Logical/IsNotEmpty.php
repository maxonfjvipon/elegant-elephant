<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Is not empty.
 */
final class IsNotEmpty extends LogicalEnvelope
{
    /**
     * @param string|array|Arrayable|Text $value
     * @return IsNotEmpty
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
            new Negation(
                new IsEmpty($value)
            )
        );
    }
}