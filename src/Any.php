<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant;

use Exception;

/**
 * Any.
 *
 * Something that has value.
 */
interface Any
{
    /**
     * @return mixed
     * @throws Exception
     */
    public function value(): mixed;
}
