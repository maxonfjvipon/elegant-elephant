<?php

declare(strict_types=1);

namespace ElegantBro\Interfaces;

use Exception;

interface Stringify
{
    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string;
}
