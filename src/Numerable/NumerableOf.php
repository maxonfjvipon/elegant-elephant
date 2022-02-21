<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Numerable of.
 * @package Maxonfjvipon\Elegant_Elephant\Numerable
 */
final class NumerableOf implements Numerable
{
    use NumerableOverloaded;

    /**
     * @var float|int $origin
     */
    private float|int $origin;

    /**
     * @param float|int $num
     * @return NumerableOf
     */
    public static function new(float|int $num): NumerableOf
    {
        return new self($num);
    }

    /**
     * Ctor.
     * @param float|int $num
     */
    public function __construct(float|int $num)
    {
        $this->origin = $num;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        return $this->firstNumerableOverloaded($this->asNumber());
    }
}