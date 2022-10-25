<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Logic wrap.
 */
abstract class LogicWrap implements Logic
{
    /**
     * Ctor.
     * @param Logic $origin
     */
    public function __construct(private Logic $origin)
    {
    }

    /**
     * @return bool
     * @throws Exception
     */
    final public function asBool(): bool
    {
        return $this->origin->asBool();
    }
}
