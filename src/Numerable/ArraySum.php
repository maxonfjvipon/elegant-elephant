<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Sum of array elements.
 */
final class ArraySum implements Number
{
    use CastScalar;

    /**
     * @var array<float|int>|Arrayable<float|int> $container
     */
    private $container;

    /**
     * Ctor.
     *
     * @param array<int|float>|Arrayable<float|int> $arr
     */
    public function __construct($arr)
    {
        $this->container = $arr;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    public function value()
    {
        return array_sum($this->scalarCast($this->container));
    }
}
