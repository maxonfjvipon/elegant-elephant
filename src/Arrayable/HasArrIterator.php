<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use ArrayIterator;
use Traversable;

trait HasArrIterator
{
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->asArray());
    }
}