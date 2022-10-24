<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant;

use Exception;

/**
 * Text.
 */
interface Txt
{
    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string;
}
