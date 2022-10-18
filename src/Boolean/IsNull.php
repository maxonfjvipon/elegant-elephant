<?php

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Maxonfjvipon\Elegant_Elephant\Boolean;

/**
 * Check is null.
 */
final class IsNull extends BoolEnvelope
{
    /**
     * Ctor.
     *
     * @param bool|Boolean $origin
     */
    final public function __construct($origin)
    {
        parent::__construct(
            new BooleanOf($origin == null)
        );
    }
}
