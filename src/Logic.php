<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant;

use Exception;

/**
 * Logic/Boolean.
 */
interface Logic
{
    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool;
}
