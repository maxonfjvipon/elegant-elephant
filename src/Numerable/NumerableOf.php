<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Numerable of.
 * @package Maxonfjvipon\Elegant_Elephant\Numerable
 */
final class NumerableOf implements Numerable
{
    use NumerableOverloaded;

    /**
     * @param float|int|Any $num
     * @return NumerableOf
     */
    public static function new(float|int|Any $num): NumerableOf
    {
        return new self($num);
    }

    /**
     * Ctor.
     * @param float|int|Any $origin
     */
    public function __construct(private float|int|Any $origin)
    {
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        if ($this->origin instanceof Any) {
            if (!is_numeric($res = $this->origin->asAny())) {
                throw new Exception("Any object must return a float or an integer");
            }
            return $res;
        }
        return $this->origin;
    }
}