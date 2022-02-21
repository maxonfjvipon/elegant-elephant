<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Decremented numerable.
 * @package Maxonfjvipon\Elegant_Elephant\Numerable
 */
final class Decremented implements Numerable
{
    /**
     * @var float|int|Numerable $origin
     */
    private float|int|Numerable $origin;

    /**
     * @param float|int|Numerable $origin
     * @return Decremented
     */
    public static function new(float|int|Numerable $origin): Decremented
    {
        return new self($origin);
    }

    /**
     * Ctor.
     * @param float|int|Numerable $origin
     */
    public function __construct(float|int|Numerable $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        return Addition::new($this->origin, -1)->asNumber();
    }
}