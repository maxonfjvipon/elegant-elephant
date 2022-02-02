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
     * @var float|int|string|Numerable $origin
     */
    private float|int|string|Numerable $origin;

    /**
     * @param float|int|Numerable $origin
     * @return Decremented
     */
    public static function new(float|int|string|Numerable $origin): Decremented
    {
        return new self($origin);
    }

    /**
     * Ctor.
     * @param float|int|string|Numerable $origin
     */
    public function __construct(float|int|string|Numerable $origin)
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