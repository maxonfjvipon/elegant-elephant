<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant;

use Countable;
use Exception;

/**
 * Arrayable.
 */
interface Arrayable extends Countable
{
    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array;
}
