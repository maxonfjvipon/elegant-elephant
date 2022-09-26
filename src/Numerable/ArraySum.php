<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\CastArrayable;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Sum of array elements.
 */
final class ArraySum implements Numerable
{
    use CastArrayable;

    /**
     * @var array<float|int>|Arrayable $container
     */
    private $container;

    /**
     * Ctor wrap.
     *
     * @param array<float|int>|Arrayable $arr
     * @return self
     */
    public static function new($arr): self
    {
        return new self($arr);
    }

    /**
     * Ctor.
     *
     * @param array<int|float>|Arrayable $arr
     */
    public function __construct($arr)
    {
        $this->container = $arr;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    public function asNumber()
    {
        return array_sum($this->arrayableCast($this->container));
    }
}
