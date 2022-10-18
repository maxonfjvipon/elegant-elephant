<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Substring.
 */
final class TxtSubstr extends TxtEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param string|Text $text
     * @param int $offset
     * @param int|null $length
     */
    final public function __construct($text, int $offset, ?int $length = null)
    {
        parent::__construct(
            new TxtFromCallback(
                fn () => !!$length
                    ? substr((string) $this->mixedCast($text), $offset, $length)
                    : substr((string) $this->mixedCast($text), $offset)
            )
        );
    }
}
