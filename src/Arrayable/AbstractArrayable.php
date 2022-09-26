<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use IteratorAggregate;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable iterable
 */
abstract class AbstractArrayable implements Arrayable, IteratorAggregate
{
    use HasArrIterator;

    /**
     * @return int
     * @throws Exception
     */
    public function count(): int
    {
        return count($this->asArray());
    }
}
