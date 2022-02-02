<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Subtracted.
 * @package Maxonfjvipon\Elegant_Elephant\Numerable
 */
final class Subtraction implements Numerable
{
    /**
     * @var float|int|Numerable $toReduce
     */
    private float|int|Numerable $toReduce;

    /**
     * @var float|int|Numerable $toSubtract
     */
    private float|int|Numerable $toSubtract;

    /**
     * @param float|int|Numerable $toReduce
     * @param float|int|Numerable $toSubtract
     * @return Subtraction
     */
    public static function new(float|int|Numerable $toReduce, float|int|Numerable $toSubtract): Subtraction
    {
        return new self($toReduce, $toSubtract);
    }

    /**
     * Ctor.
     * @param float|int|Numerable $toReduce
     * @param float|int|Numerable $toSubtract
     */
    public function __construct(float|int|Numerable $toReduce, float|int|Numerable $toSubtract)
    {
        $this->toReduce = $toReduce;
        $this->toSubtract = $toSubtract;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        return Addition::new(
            $this->toReduce,
            Multiplication::new($this->toSubtract, -1)
        )->asNumber();
    }
}