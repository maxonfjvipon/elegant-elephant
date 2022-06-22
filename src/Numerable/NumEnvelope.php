<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Numerable envelope.
 */
class NumEnvelope implements Numerable
{
    /**
     * @var Numerable $origin
     */
    private Numerable $origin;

    /**
     * @param Numerable $origin
     */
    public function __construct(Numerable $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        return $this->origin->asNumber();
    }
}