<?php

declare(strict_types=1);

namespace ElegantBro\Interfaces;

use Exception;

interface Numeric
{
    /**
     * @return string Number
     * @throws Exception
     */
    public function asNumber(): string;
}
