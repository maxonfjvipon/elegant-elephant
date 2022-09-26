<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
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
     * @return float|int
     * @throws Exception
     */
    public function asNumber()
    {
        return $this->origin->asNumber();
    }
}
