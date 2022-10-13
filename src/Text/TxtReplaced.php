<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text replaced.
 */
final class TxtReplaced extends TxtEnvelope
{
    use CastScalar;

    /**
     * Ctor.
     *
     * @param string|Text $search
     * @param string|Text $replace
     * @param string|Text $subject
     */
    public function __construct($search, $replace, $subject)
    {
        parent::__construct(
            new TxtFromCallback(
                fn () => str_replace(
                    (string) $this->scalarCast($search),
                    (string) $this->scalarCast($replace),
                    (string) $this->scalarCast($subject)
                )
            )
        );
    }
}
