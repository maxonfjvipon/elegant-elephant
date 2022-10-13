<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text encoded to JSON.
 */
final class TxtJsonEncoded extends TxtEnvelope
{
    use CastScalar;

    /**
     * Ctor.
     *
     * @param string|int|float|array<mixed>|bool|Text|Number|Arrayable|Boolean|Scalar $value
     */
    public function __construct($value)
    {
        parent::__construct(
            new TxtFromCallback(
                fn () => (string) json_encode($this->scalarCast($value))
            )
        );
    }
}