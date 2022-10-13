<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Scalar;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar;

/**
 * Scalar envelope.
 */
class SclEnvelope implements Scalar
{
    /**
     * @var Scalar $origin
     */
    private Scalar $origin;

    /**
     * Ctor.
     *
     * @param Scalar $scalar
     */
    public function __construct(Scalar $scalar)
    {
        $this->origin = $scalar;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function value()
    {
        return $this->origin->value();
    }
}
