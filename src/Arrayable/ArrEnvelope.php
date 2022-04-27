<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use ArrayIterator;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Traversable;

abstract class ArrEnvelope implements Arrayable
{
    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->asArray());
    }
}