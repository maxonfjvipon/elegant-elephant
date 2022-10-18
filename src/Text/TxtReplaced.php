<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text replaced.
 */
final class TxtReplaced extends TxtEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param string|Text $search
     * @param string|Text $replace
     * @param string|Text $subject
     */
    final public function __construct($search, $replace, $subject)
    {
        parent::__construct(
            new TxtFromCallback(
                fn () => str_replace(
                    (string) $this->mixedCast($search),
                    (string) $this->mixedCast($replace),
                    (string) $this->mixedCast($subject)
                )
            )
        );
    }
}
