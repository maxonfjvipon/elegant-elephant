<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant;

use Exception;

/**
 * Array.
 */
interface Arr
{
    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array;
}
