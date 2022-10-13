<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;

/**
 * Scalar.
 *
 * Something that has value.
 */
interface Scalar
{
    /**
     * @return mixed
     * @throws Exception
     */
    public function value();
}
