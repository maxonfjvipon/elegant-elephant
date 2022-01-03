<?php

declare(strict_types=1);

namespace ElegantBro\Interfaces;

use Exception;

interface Arrayee
{
    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array;
}
