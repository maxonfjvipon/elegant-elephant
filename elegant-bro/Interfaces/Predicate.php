<?php

declare(strict_types=1);

namespace ElegantBro\Interfaces;

use Exception;

interface Predicate
{
    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool;
}
