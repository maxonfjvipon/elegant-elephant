<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text in upper case.
 */
final class TxtUpper extends TxtEnvelope
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
                fn () => strtoupper((string) $this->scalarCast($text))
            )
        );
    }
}
