<?php

namespace Maxonfjvipon\Elegant_Elephant\Any;

use Maxonfjvipon\Elegant_Elephant\Any;

/**
 * Any envelope.
 */
class AnyEnvelope implements Any
{
    /**
     * Ctor.
     *
     * @param Any $any
     */
    public function __construct(private Any $any)
    {
    }

    /**
     * @inheritDoc
     */
    public function asAny(): mixed
    {
        return $this->any->asAny();
    }
}
