<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant;

use Exception;

/**
 * Number.
 */
interface Num
{
    /**
     * @return float|int
     * @throws Exception
     */
    public function asNumber();
}
