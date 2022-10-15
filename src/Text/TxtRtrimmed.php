<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text trimmed from right.
 */
final class TxtRtrimmed extends TxtEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param string|Text $text
     */
    public function __construct($text)
    {
        parent::__construct(
            new TxtFromCallback(
                fn () => rtrim((string) $this->mixedCast($text))
            )
        );
    }
}
