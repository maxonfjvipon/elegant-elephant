<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;
use TypeError;

/**
 * Number.
 */
interface Number
{
    /**
     * @return float|int
     * @throws Exception
     */
    public function asNumber();
}
