<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text lowered.
 */
final class TxtLowered extends TxtEnvelope
{
    use CastScalar;

    /**
     * Ctor.
     *
     * @param string|Text $text
     */
    public function __construct($text)
    {
        parent::__construct(
            new TxtFromCallback(
                fn () => strtolower((string) $this->scalarCast($text))
            )
        );
    }
}
