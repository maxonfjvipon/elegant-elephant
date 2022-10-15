<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant;

use Exception;
use Stringable;

/**
 * Text.
 */
interface Text extends Stringable
{
    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string;
}
