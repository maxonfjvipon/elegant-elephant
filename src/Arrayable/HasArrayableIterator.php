<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use ArrayIterator;
use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Traversable;

/**
 * Array iterator for {@see Arrayable}
 */
trait HasArrayableIterator
{
    /**
     * @return Traversable<mixed>
     * @throws Exception
     */
    final public function getIterator(): Traversable
    {
        return new ArrayIterator($this->asArray());
    }
}
