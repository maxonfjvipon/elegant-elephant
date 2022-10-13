<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Is empty.
 */
final class IsEmpty extends BoolEnvelope
{
    /**
     * Ctor.
     *
     * @param string|array<mixed>|Arrayable<mixed>|Text $value
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
