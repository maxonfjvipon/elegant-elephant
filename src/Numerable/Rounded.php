<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Rounded number
 */
final class Rounded implements Numerable
{
    use NumerableOverloaded;

    /**
     * @var float|int|Numerable $number
     */
    private float|int|Numerable $number;

    /**
     * @var int $precision
     */
    private int $precision;

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
    public function __construct(float|int|Numerable $num, int $precision = 0)
    {
        $this->number = $num;
        $this->precision = $precision;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        return round($this->firstNumerableOverloaded($this->number), $this->precision);
    }
}