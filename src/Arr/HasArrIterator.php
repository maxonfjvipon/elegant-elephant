<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use ArrayIterator;
use Exception;
use Maxonfjvipon\ElegantElephant\Arr;
use Traversable;

/**
 * Array iterator for {@see Arr}
 */
trait HasArrIterator
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
