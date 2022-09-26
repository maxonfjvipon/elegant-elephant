<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Logical envelope.
 */
class LogicalEnvelope implements Logical
{
    /**
     * @var Logical $origin
     */
    private Logical $origin;

    /**
     * Ctor.
     *
     * @param Logical $origin
     */
    public function __construct(Logical $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool
    {
        return $this->origin->asBool();
    }
}
