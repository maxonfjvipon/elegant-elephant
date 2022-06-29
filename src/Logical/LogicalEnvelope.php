<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Logical envelope.
 */
class LogicalEnvelope implements Logical
{
    /**
     * Ctor.
     * @param Logical $logical
     */
    public function __construct(private Logical $logical)
    {
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return $this->logical->asBool();
    }
}