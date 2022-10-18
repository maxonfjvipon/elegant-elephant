<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Sum of array elements.
 */
final class ArraySum implements Number
{
    use CastMixed;

    /**
     * @var array<float|int>|Arrayable<float|int> $container
     */
    private $container;

    /**
     * Ctor.
     *
     * @param array<int|float>|Arrayable<float|int> $arr
     */
    final public function __construct($arr)
    {
        $this->container = $arr;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    final public function asNumber()
    {
        return array_sum($this->mixedCast($this->container));
    }
}
