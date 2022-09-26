<?php

declare(strict_types=1);

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
     * Ctor wrap.
     *
     * @param string|array<mixed>|Arrayable|Text $value
     * @return self
     */
    public static function new($value): self
    {
        return new self($value);
    }

    /**
     * Ctor.
     *
     * @param string|array<mixed>|Arrayable|Text $value
     */
    public function __construct($value)
    {
        parent::__construct(
            new EqualityOf(
                new LengthOf($value),
                0
            )
        );
    }
}
