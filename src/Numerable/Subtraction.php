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
     * @var Numerable $toReduce
     */
    private Numerable $toReduce;

    /**
     * @var Numerable $toSubtract
     */
    private Numerable $toSubtract;

    /**
     * @param Numerable $toReduce
     * @param Numerable $toSubtract
     * @return Subtraction
     */
    public static function new(Numerable $toReduce, Numerable $toSubtract): Subtraction
    {
        return new self($toReduce, $toSubtract);
    }

    /**
     * Ctor.
     * @param Numerable $toReduce
     * @param Numerable $toSubtract
     */
    private function __construct(Numerable $toReduce, Numerable $toSubtract)
    {
        $this->toReduce = $toReduce;
        $this->toSubtract = $toSubtract;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): string
    {
        return $this->toReduce->asNumber() - $this->toSubtract->asNumber();
    }
}