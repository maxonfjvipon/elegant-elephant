<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Number;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Length.
 */
final class LengthOf extends NumEnvelope
{
    use CastScalar;

    /**
     * Ctor.
     *
     * @param string|array<mixed>|Text|Arrayable<mixed> $arg
     */
    public function __construct($arg)
    {
        parent::__construct(
            new NumTernary(
                is_array($arg) || $arg instanceof Arrayable,
                fn () => count((array) $this->scalarCast($arg)),
                fn () => strlen((string) $this->scalarCast($arg))
            )
        );
    }
}
