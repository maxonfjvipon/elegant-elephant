<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;

/**
 * Text.
 */
interface Text
{
    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string;
}
