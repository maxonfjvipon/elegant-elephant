<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Scalar\SclTernary;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Ternary text.
 */
final class TxtTernary extends TxtEnvelope
{
    /**
     * Ctor.
     *
     * @param bool|Boolean $condition
     * @param string|callable|Text $first
     * @param string|callable|Text $second
     */
    final public function __construct($condition, $first, $second)
    {
        parent::__construct(
            new TextOf(
                new SclTernary(
                    $condition,
                    $first,
                    $second
                )
            )
        );
    }
}
