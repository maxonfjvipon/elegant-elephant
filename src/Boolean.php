<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;

/**
 * Boolean.
 */
interface Boolean extends Scalar
{
    /**
     * @return bool
     * @throws Exception
     */
    public function value(): bool;
}
