<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Preg replaced text.
 */
final class TxtPregReplaced extends TxtEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param string|array<string>|Text|Arrayable<mixed> $pattern
     * @param string|array<string>|Text|Arrayable<mixed> $replacement
     * @param string|array<string>|Text|Arrayable<mixed> $subject
     */
    public function __construct($pattern, $replacement, $subject)
    {
        parent::__construct(
            new TxtFromCallback(
                fn () => preg_replace(
                    $this->mixedCast($pattern),
                    $this->mixedCast($replacement),
                    $this->mixedCast($subject)
                )
            )
        );
    }
}
