<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Rounded number
 */
final class Rounded implements Numerable
{
    use NumerableOverloaded;

    /**
     * Ctor wrap.
     * @param float|int|Numerable $num
     * @param int $precision
     * @return Rounded
     */
    public static function new(float|int|Numerable $num, int $precision = 0)
    {
        return new self($num, $precision);
    }

    /**
     * Ctor.
     * @param float|int|Numerable $num
     * @param int $precision
     */
    public function __construct(private float|int|Numerable $num, private int $precision = 0)
    {
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        return round($this->firstNumerableOverloaded($this->num), $this->precision);
    }
}