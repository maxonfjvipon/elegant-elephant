<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;

/**
 * Boolean envelope.
 */
abstract class BoolEnvelope implements Boolean
{
    /**
     * @var \Maxonfjvipon\Elegant_Elephant\Boolean $origin
     */
    private \Maxonfjvipon\Elegant_Elephant\Boolean $origin;

    /**
     * Ctor.
     *
     * @param Boolean $origin
     */
    public function __construct(\Maxonfjvipon\Elegant_Elephant\Boolean $origin)
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
