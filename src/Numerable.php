<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;
use TypeError;

/**
 * Numerable.
 */
interface Numerable
{
    /**
     * @return float|int
     * @throws Exception
     */
    public function asNumber();
}
