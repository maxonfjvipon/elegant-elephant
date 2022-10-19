<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant;

use Countable;
use Exception;
use IteratorAggregate;

/**
 * Arrayable.
 */
interface Arrayable
{
    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array;
}
