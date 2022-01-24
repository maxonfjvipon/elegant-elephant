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
     * @var Numerable $origin
     */
    private Numerable $origin;

    /**
     * @param Numerable $origin
     * @return Decremented
     */
    public static function new(Numerable $origin): Decremented
    {
        return new self($origin);
    }

    /**
     * Ctor.
     * @param Numerable $origin
     */
    private function __construct(Numerable $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): string
    {
        return Subtraction::new(
            $this->origin,
            NumerableOf::int(1)
        )->asNumber();
    }
}