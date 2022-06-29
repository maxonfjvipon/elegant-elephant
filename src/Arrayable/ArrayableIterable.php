<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use IteratorAggregate;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable iterable
 */
abstract class ArrayableIterable implements Arrayable, IteratorAggregate
{
    use HasArrIterator;
}