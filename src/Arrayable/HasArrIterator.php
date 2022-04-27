<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use ArrayIterator;
use Traversable;

/**
 * @method array asArray()
 */
trait HasArrIterator
{
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->asArray());
    }
}