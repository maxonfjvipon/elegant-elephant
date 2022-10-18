<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number;

/**
 * Number envelope.
 */
abstract class NumEnvelope implements Number
{
    /**
     * @var Number $origin
     */
    private Number $origin;

    /**
     * @param Number $origin
     */
    public function __construct(Number $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    final public function asNumber()
    {
        return $this->origin->asNumber();
    }
}
