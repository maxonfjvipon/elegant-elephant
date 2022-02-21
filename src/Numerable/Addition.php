<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\OverloadedElephant\Overloadable;
use TypeError;

/**
 * Addition.
 */
final class Addition implements Numerable
{
    use NumerableOverloaded;

    /**
     * @var float|int|Numerable $addTo
     */
    private float|int|Numerable $addTo;

    /**
     * @var float|int|Numerable $toAdd
     */
    private float|int|Numerable $toAdd;

    /**
     * @param float|int|Numerable $addTo
     * @param float|int|Numerable $toAdd
     * @return Addition
     */
    public static function new(float|int|Numerable $addTo, float|int|Numerable $toAdd): Addition
    {
        return new self($addTo, $toAdd);
    }

    /**
     * Ctor.
     * @param float|int|Numerable $addTo
     * @param float|int|Numerable $toAdd
     */
    public function __construct(float|int|Numerable $addTo, float|int|Numerable $toAdd)
    {
        $this->addTo = $addTo;
        $this->toAdd = $toAdd;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        $operands = $this->numerableOverloaded($this->addTo, $this->toAdd);
        return $operands[0] + $operands[1];
    }
}