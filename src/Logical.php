<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;

/**
 * Boolean.
 */
interface Logical
{
    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool;
}
