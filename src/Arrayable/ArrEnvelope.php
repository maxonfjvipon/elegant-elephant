<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable envelope.
 */
class ArrEnvelope extends ArrayableIterable
{
    /**
     * Ctor.
     * @param Arrayable $origin
     */
    public function __construct(private Arrayable $origin)
    {
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return $this->origin->asArray();
    }
}