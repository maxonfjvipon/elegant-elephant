<?php

declare(strict_types=1);

namespace ElegantBro\Interfaces;

use Exception;
use Iterator;

interface Iteratee
{
    /**
     * @return Iterator
     * @throws Exception
     */
    public function asIterator(): Iterator;
}
